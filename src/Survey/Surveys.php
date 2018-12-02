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
  id       int(11) NOT NULL, 
  `tag`    varchar(30) NOT NULL, 
  semester char(4) NOT NULL, 
  section  char(3) NOT NULL, 
  data     mediumtext, 
  metadata mediumtext);

SQL;

		return $query;
	}


}