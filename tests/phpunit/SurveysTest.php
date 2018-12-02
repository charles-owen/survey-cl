<?php
/** @file
 * Unit tests for the class Surveys
 * @cond 
 */
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/cls/SurveyDatabaseTestBase.php';

use CL\Survey\Surveys;
use CL\Course\Member;
use CL\Course\Test\DummyMember;

class SurveysTest extends SurveyDatabaseTestBase {
	/**
	 * @return PHPUnit_Extensions_Database_DataSet_IDataSet
	 */
	public function getDataSet() {
		return $this->dataSets(['surveydone.xml']);
	}

	public function ensureTables() {
		$this->ensureTable(new Surveys($this->site->db));
	}

	public function test() {
		$table = new Surveys($this->site->db);

		$dummy = new DummyMember();
		$member22 = $dummy->create(12, 22, Member::STUDENT);


	}

}

/// @endcond
?>
