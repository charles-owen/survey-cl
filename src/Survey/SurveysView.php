<?php
/**
 * @file
 * View class for a page that allows the user to select among one or more possible surveys.
 */

namespace CL\Survey;


use CL\Site\Site;
use CL\Course\Member;


/**
 * View class for a page that allows the user to select among one or more possible surveys.
 */
class SurveysView extends \CL\Course\View {
	/**
	 * SurveysView constructor.
	 * @param Site $site The Site object
	 * @param array $options Options to pass to the view
	 */
	public function __construct(Site $site, array $options = []) {
		parent::__construct($site, $options);

		$this->setTitle('Surveys');
	}

	/**
	 * Create a link to a specific survey
	 * @param string $tag Tag that identifies the survey
	 * @return string HTML
	 */
	public function link($tag) {
		$tag = strip_tags($tag);
		$survey = $this->getSurvey($tag);
		if($survey === null) {
			return "Survey <em>$tag</em> does not exist";
		}

		if($this->user->role() !== Member::STUDENT &&
			!$this->user->atLeast(Member::INSTRUCTOR)) {
			return "Not available";
		}

		if(!$this->user->atLeast(Member::INSTRUCTOR)) {
			$surveysDone = new SurveysDone($this->site->db);
			if($surveysDone->isDone($this->user->member, $tag)) {
				$img = $this->site->root . '/vendor/cl/site/img/checkmenu.png';
				return <<<HTML
$survey->title <img src="$img" width="24" height="25" alt="Checkmark">
HTML;
			}
		}

		$url = $this->url($tag);
		return <<<HTML
<a href="$url">$survey->title</a>
HTML;

	}

	/**
	 * Get a URL for a survey on the site.
	 * @param string $tag Tag that identifies the survey
	 * @return string HTML
	 */
	public function url($tag) {
		return $this->site->root . '/cl/survey/' . $tag;
	}


	/**
	 * Present the surveys as a list on links.
	 * @return string HTML
	 */
	public function present() {
		$html = '';

		foreach($this->surveys as $item) {
			if(is_string($item)) {
				$html .= $item;
			}

			if($item instanceof Survey) {
				$html .= <<<HTML
<a href="$item->url">$item->title</a>
HTML;

			}
		}

		return $html;
	}

	/**
	 * Get a survey from the system.
	 *
	 * This cache's locally so the survey is only loaded from the file system once.
	 * @param string $tag The survey tag.
	 * @return Survey|null Survey object or null if it does not exist.
	 */
	public function getSurvey($tag) {
		if(isset($this->surveys[$tag])) {
			return $this->surveys[$tag];
		}

		return Survey::load($this->site, $this->user, $tag);
	}

	private $surveys = [];
}