<?php
/**
 * @file
 * Table class for the survey table.
 */

namespace CL\Survey;

use CL\Site\MetaData;
use CL\Tables\Table;
use CL\Course\Member;

/**
 * Table class for the survey table.
 *
 * Represents a single survey result.
 */
class Surveys extends Table {
	/**
	 * Surveys constructor.
	 * @param \CL\Tables\Config $config Database configuration object
	 */
	function __construct(\CL\Tables\Config $config) {
		parent::__construct($config, "survey");
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
  id       int(11) NOT NULL AUTO_INCREMENT, 
  `tag`    varchar(30) NOT NULL, 
  semester char(4) NOT NULL, 
  section  char(3) NOT NULL, 
  time     datetime NOT NULL, 
  data     mediumtext NOT NULL, 
  metadata mediumtext, 
  PRIMARY KEY (id));


SQL;

		return $query;
	}

	/**
	 * Add a survey to the table
	 * @param string $tag Tag associated with this survey
	 * @param string $semester Semester
	 * @param string $section Section code
	 * @param string $data POST data from the survey, JSON encoded
	 * @param int $time Timestamp
	 * @return bool true if successful
	 */
	public function add($tag, $semester, $section, $data, $time) {
		$sql = <<<SQL
insert into $this->tablename(`tag`, semester, section, data, time)
values(?, ?, ?, ?, ?)
SQL;

		$stmt = $this->pdo->prepare($sql);
		if($stmt->execute([$tag, $semester, $section, $data, $this->timeStr($time)]) === false) {
			return 0;
		}

		return $this->pdo->lastInsertId();
	}

	/**
	 * Get all surveys for a given semester/section/tag
	 * @param string $tag
	 * @param string $semester
	 * @param string $section
	 * @return array of all data.
	 */
	public function get($tag, $semester, $section) {
		$sql = <<<SQL
select * from $this->tablename
where `tag`=? and semester=? and section=?
SQL;

		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$tag, $semester, $section]);
		$results = [];
		foreach($stmt as $row) {
			$results[] = [
				'id'=>$row['id'],
				'time'=>strtotime($row['time']),
				'data'=>$row['data']
			];
		}

		return $results;
	}

}