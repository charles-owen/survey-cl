<?php
/**
 * @file
 * A comment area for the survey.
 */

namespace CL\Survey;

/** A comment area for the survey. */
class SurveyComment extends SurveyItem {
	/** Constructor
	 * @param $tag Surey item tag
	 * @param $text Text for the survey item description */
	public function __construct($tag, $text) {
		$this->tag = $tag;
		$this->text = $text;
	}

	/** Present this survey item as HTML
	 * @returns HTML for item */
	public function present() {
		$html = <<<HTML
<p>$this->text</p>
<p><textarea rows="4" cols="60" id="$this->tag" name="$this->tag"></textarea></p>
HTML;

		return $html;
	}

	/** Present this survey item result as HTML
	 * @returns HTML for item */
	public function present_result($surveydata) {
		$comment = isset($surveydata[$this->tag]) ? $surveydata[$this->tag] : '';
		if($comment === '') {$comment = '&nbsp;';}

		$html = <<<HTML
<p>$this->text</p>
<p class="comment">$comment</p>
HTML;

		return $html;
	}

	private $tag;
	private $text;
}