<?php
/**
 * @file
 * Table class for the surveydone table
 */

namespace CL\Survey;

use CL\Tables\Table;
use CL\Course\Member;

/**
 * Class for the surveydone table
 */
class SurveysDone extends Table {

	/**
	 * SurveysDone constructor.
	 * @param \CL\Tables\Config $config Database configuration object
	 */
	function __construct(\CL\Tables\Config $config) {
		parent::__construct($config, "surveydone");
	}

	/**
	 * SQL create table command
	 *
	 * Function to create an SQL create table command
	 * for the grades table
	 * @returns string SQL
	 */
	public function createSQL() {
		$query = <<<SQL
CREATE TABLE IF NOT EXISTS `$this->tablename` (
  memberid  int(11) NOT NULL, 
  `tag`     varchar(30) NOT NULL, 
  surveyid  int(11), 
  time      datetime NOT NULL, 
  surveyid2 int(11), 
  PRIMARY KEY (memberid, 
  `tag`));

SQL;

		return $query;
	}


	/**
	 * Has this user done this survey?
	 * @param Member $member The member
	 * @param string $tag The survey tag
	 * @return boolean true if user has done this survey
	 */
	public function isDone(Member $member, $tag) {
		$pdo = $this->pdo;

		$sql = <<<SQL
select * from $this->tablename where memberid=? and tag=?
SQL;

		$stmt = $pdo->prepare($sql);
		if($stmt->execute([$member->id, $tag]) === false) {
			return false;
		}

		return $stmt->rowCount() > 0;
	}

	/**
	 * Indicate that this user has done this survey
	 * @param Member $member The member
	 * @param string $tag The survey tag
	 * @param int|null $surveyId Optional survey ID or NULL if none
	 * @param int $time Timestamp
	 * @return boolean true on success
	 */
	public function setDone(Member $member, $tag, $surveyId, $time) {
		$pdo = $this->pdo;

		$sql = <<<SQL
insert into $this->tablename(memberid, tag, surveyid, time) values(?, ?, ?, ?)
SQL;

		try {
			$stmt = $pdo->prepare($sql);
			$stmt->execute([$member->id, $tag, $surveyId, $this->timeStr($time)]);
			return $stmt->rowCount() > 0;
		} catch(\PDOException $exception) {
			return false;
		}
	}

	/**
	 * Get the information about a completed survey.
	 * @param Member $member The member
	 * @param string $tag The survey tag
	 * @return array|null Array with keys 'time' and 'surveyId' if exists.
	 */
	public function getDone(Member $member, $tag) {
		$pdo = $this->pdo;

		$sql = <<<SQL
select surveyid, time from $this->tablename where memberid=? and tag=?
SQL;

		$stmt = $pdo->prepare($sql);
		if($stmt->execute([$member->id, $tag]) === false) {
			return null;
		}

		$row = $stmt->fetch(\PDO::FETCH_ASSOC);
		if($row === null || $row === false) {
			return null;
		}

		return ['surveyId'=>($row['surveyid']!==null ? +$row['surveyid'] : null), 'time'=>strtotime($row['time'])];
	}

}