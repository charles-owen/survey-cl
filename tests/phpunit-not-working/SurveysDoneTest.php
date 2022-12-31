<?php
/** @file
 * Unit tests for the class SurveysDone
 * @cond 
 */
require_once __DIR__ . '/init.php';
require_once __DIR__ . '/cls/SurveyDatabaseTestBase.php';

use CL\Survey\SurveysDone;
use CL\Course\Member;
use CL\Course\Test\DummyMember;

class SurveysDoneTest extends SurveyDatabaseTestBase {
	/**
	 * @return PHPUnit_Extensions_Database_DataSet_IDataSet
	 */
	public function getDataSet() {
		return $this->dataSets(['surveydone.xml']);
	}

	public function ensureTables() {
		$this->ensureTable(new SurveysDone($this->site->db));
	}

	public function test() {
		$table = new SurveysDone($this->site->db);

		$dummy = new DummyMember();
		$member22 = $dummy->create(12, 22, Member::STUDENT);

		$this->assertFalse($table->isDone($member22->member, 'survey'));
		$result = $table->getDone($member22->member, 'survey');
		$this->assertNull($result);

		$time1 = time() + 123;

		$this->assertTrue($table->setDone($member22->member, 'survey', null, $time1));
		$this->assertFalse($table->setDone($member22->member, 'survey', null, $time1));

		$this->assertTrue($table->isDone($member22->member, 'survey'));

		$result = $table->getDone($member22->member, 'survey');
		$this->assertEquals($result['time'], $time1);
	}

}

/// @endcond
?>
