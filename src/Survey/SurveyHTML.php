<?php
/**
 * @file
 * Survey item that is HTML content
 */

namespace CL\Survey;

/** Survey item that is HTML content */
class SurveyHTML extends SurveyItem {
	/** Constructor
	 * @param string $html HTML for the survey item */
	public function __construct($html) {
		$this->html = $html;
	}

	/** Present this survey item
	 * @return string HTML */
	public function present() {
		return $this->html;
	}

	/** Present this survey item result
	 * @return string HTML */
	public function present_result($surveydata) {
		return $this->html;
	}

	private $html;
}