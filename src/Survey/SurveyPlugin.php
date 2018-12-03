<?php
/**
 * @file
 * Plugin class for the Survey Subsystem
 */

namespace CL\Survey;

use CL\Site\Site;
use CL\Site\System\Server;
use CL\Site\Router;
use CL\Course\AssignmentCategory;
use CL\Console\ConsoleView;

/**
 * Plugin class for the Survey Subsystem
 */
class SurveyPlugin extends \CL\Site\Plugin {
	/**
	 * A tag that represents this plugin
	 * @return string A tag like 'course', 'users', etc.
	 */
	public function tag() {return 'survey';}

	/**
	 * Return an array of tags indicating what plugins this one is dependent on.
	 * @return array of tags this plugin is dependent on
	 */
	public function depends() {return ['course'];}

	/**
	 * Install the plugin
	 * @param Site $site The Site configuration object
	 */
	public function install(Site $site) {
		$this->site = $site;
	}

	/**
	 * Ensure tables exist for the Survey subsystem.
	 * @param Site $site The site configuration component
	 */
	public function ensureTables(Site $site) {
		$maker = new SurveyTables($site->db);
		$maker->create(false);
	}

	/**
	 * Amend existing object
	 * The Router is amended with routes for the login page
	 * and for the user API.
	 * @param $object Object to amend.
	 */
	public function amend($object) {
		if($object instanceof Router) {
			$router = $object;

			$router->addRoute(['survey', ':tag'], function(Site $site, Server $server, array $params, array $properties, $time) {
				$view = new SurveyView($site, $server, $properties);
				return $view->whole();
			});


			$router->addRoute(['api', 'survey', '*'], function(Site $site, Server $server, array $params, array $properties, $time) {
				$resource = new SurveyApi();
				return $resource->apiDispatch($site, $server, $params, $properties, $time);
			});
		} else if($object instanceof ConsoleView) {
			$object->addJS('survey');
		}
	}

	private $site = null;
}