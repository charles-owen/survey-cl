<?php
/** @file
 * Base class for database tests.
 */

use CL\Site\Test\DatabaseTestBase;


/**
 * Base class for database tests.
 */
abstract class SurveyDatabaseTestBase extends DatabaseTestBase {

	public function __construct() {
		parent::__construct(__DIR__ . '/..');
	}

	protected function createSite() {
		$site = parent::createSite();

		return $site;
	}
}
