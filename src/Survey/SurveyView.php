<?php
/**
 * @file
 * View class for viewing/editing surveys
 */

namespace CL\Survey;


use CL\Site\Site;
use CL\Site\System\Server;
use CL\Course\Member;

/**
 * View class for viewing/editing surveys
 */
class SurveyView extends \CL\Course\View {
	/**
	 * SectionSelectorView constructor.
	 * @param Site $site Site object
	 * @param Server $server The Server object
	 * @param array $properties Router properties (contains the tag)
	 */
	public function __construct(Site $site, Server $server, array $properties) {
		parent::__construct($site);

		$this->tag = strip_tags($properties['tag']);
		$this->survey = Survey::load($site, $this->user, $this->tag);

		if($this->user->role() !== Member::STUDENT &&
			!$this->user->atLeast(Member::INSTRUCTOR)) {
			$this->unavailable = true;
			$this->setTitle('Unavailable survey');
			return;
		}

		if($this->survey !== null) {
			$this->setTitle($this->survey->title);
			$surveysDone = new SurveysDone($this->site->db);
			if($surveysDone->isDone($this->user->member, $this->tag)) {
				$this->done = true;
			} else {
				if($this->survey->css !== null) {
					$this->addCSS($this->survey->css);
				}
			}

		} else {
			$this->setTitle('Invalid survey ' . $this->tag);
		}
	}


	/**
	 * Present the section selector
	 * @return string HTML
	 */
	public function present() {
		if($this->survey === null) {
			return <<<HTML
<p class="shoutout full">Survey $this->tag does not exist.</p>
HTML;
		}

		if($this->unavailable) {
			return <<<HTML
<p class="shoutout full">Survey not available.</p>
HTML;
		}

		if($this->user->atLeast(Member::INSTRUCTOR)) {
			return $this->presentResults();
		}

		if($this->done) {
			$redirect = $this->site->root . $this->survey->redirect;
			return <<<HTML
<div class="full">
<p class="shoutout">You have already completed this survey.</p>
<p class="center"><a href="$redirect">Exit</a></p>
</div>

HTML;
		}

		$html = $this->survey->present($this->site);

		return $html;
	}

	private function presentResults() {
		$surveys = new Surveys($this->site->db);
		$member = $this->user->member;
		$results = $surveys->get($this->tag, $member->semester, $member->sectionId);

		$htmlResults = '';
		foreach($results as $result) {
			$htmlResults .= $this->survey->present_result(json_decode($result['data'], true));
		}

		$html = '<div class="cl-survey">';
		$html .= $this->survey->statistics($this->site);
		$html .= '</div>';

		return $html . $htmlResults;
	}

	private function statistics() {
		$name = $this->user->displayName;



		$survey = $this->survey;



	}


	private $tag;
	private $survey;
	private $done = false;
	private $unavailable = false;
}
