<?php
/**
 * @file
 * API Resource for /api/survey
 */
namespace CL\Survey;

use CL\Site\Site;
use CL\Site\System\Server;
use CL\Site\Api\JsonAPI;
use CL\Site\Api\APIException;
use CL\Users\User;
use CL\Course\Members;
use CL\Course\Member;
use CL\Site\Util\Tags;

/**
 * API Resource for /api/scheduler
 */
class SurveyApi extends \CL\Users\Api\Resource {

	/**
	 * QuizApi constructor.
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Dispatch API calls.
	 * @param Site $site Site object
	 * @param Server $server Server object
	 * @param array $params Parameters passed by the router (after /api/quiz)
	 * @param array $properties Properties passed by the router (:id values)
	 * @param int $time Current time
	 * @return JsonAPI with response filled in
	 * @throws APIException
	 */
	public function dispatch(Site $site, Server $server, array $params, array $properties, $time) {
		$user = $this->isUser($site, Member::STUDENT);

		switch($params[0]) {
			case 'submit':
				return $this->submit($site, $server, $params, $time);

			case 'tables':
				return $this->tables($site, $server, new SurveyTables($site->db));
		}

		throw new APIException("Invalid API Path", APIException::INVALID_API_PATH);
	}

	private function submit(Site $site, Server $server, array $params, $time) {
		$user = $this->isUser($site, Member::USER);
		$member = $user->member;
		if($member === null) {
			throw new APIException("Invalid API Usage", APIException::INVALID_API_USAGE);
		}

		if($server->requestMethod === 'POST' && count($params) > 1) {
			$tag = $params[1];
			$post = $server->post;

			if(!Tags::validate($tag)) {
				throw new APIException("Invalid survey");
			}

			// Get the survey
			$survey = Survey::load($site, $user, $tag);
			if($survey === null) {
				throw new APIException("Survey $tag does not exist");
			}

			// Has user already done this survey?
			$surveysDone = new SurveysDone($site->db);
			if($surveysDone->isDone($member, $tag)) {
				throw new APIException("You have already completed this survey");
			}

			// Sanitize the form
			$post1 = [];
			foreach($post as $key => $value) {
				$post1[$key] = strip_tags($value);
			}

			$surveys = new Surveys($site->db);
			$id = $surveys->add($tag, $member->semester, $member->sectionId, json_encode($post1), $time);
			if($survey->anonymous) {
				$id = null;
			}

			$surveysDone->setDone($member, $tag, $id, $time);

		} else {
			throw new APIException("Invalid API Usage", APIException::INVALID_API_USAGE);
		}

		$json = new JsonAPI();
		return $json;
	}

}