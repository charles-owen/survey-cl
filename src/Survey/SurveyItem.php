<?php
/**
 * @file
 * Base class for a survey item
 */

namespace CL\Survey;

/**
 * Base class for a survey item
 */
abstract class SurveyItem {
	/** Present the item on the survey
	 * @return string HTML for the survey item */
	public abstract function present();

	/** Present this survey item result
	 * @return string HTML for the survey item result */
	public function present_result($surveydata) {return '';}
}
