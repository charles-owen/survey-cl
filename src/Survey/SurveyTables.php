<?php
/**
 * @file
 * Table maker for Survey tables
 */

namespace CL\Survey;

use CL\Tables\Config;

/**
 * Table maker for User subsystem tables
 */
class SurveyTables extends \CL\Tables\TableMaker {
	/**
	 * UserTables constructor.
	 * @param Config $config
	 */
	public function __construct(Config $config) {
		parent::__construct($config);

		$this->add(new Surveys($config));
		$this->add(new SurveysDone($config));
	}
}