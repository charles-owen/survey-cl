<?php
/**
 * @file
 * Present a question for the survey
 */

namespace CL\Survey;

/** Present a question for the survey */
class SurveyQuestion extends SurveyItem {
	/** Constructor
	 * @param int $num Question number
	 * @param string $text Question text
	 * @param string $desc Survey question description for result */
	public function __construct($num, $text, $desc=null) {
		$this->num = $num;
		$this->text = $text;
		$this->desc = $desc;
	}

	/** Present the item on the survey
	 * @return string HTML for the question */
	public function present() {
		$id = 'q' . $this->num;
		$commentid = 'q' . $this->num . '_comment';

		$html = <<<HTML
<p>$this->num.
  <label>
    <input type="radio" name="$id" value="SA" id="${id}_sa">
    SA</label>
  <label>
    <input type="radio" name="$id" value="A" id="${id}_a">
    A</label>
  <label>
    <input type="radio" name="$id" value="N" id="${id}_n">
    N</label>
  <label>
    <input type="radio" name="$id" value="D" id="${id}_d">
    D</label>
  <label>
    <input type="radio" name="$id" value="SD" id="${id}_sd">
    SD</label>
$this->text</p>
<p><textarea rows="4" cols="60" id="$commentid" name="$commentid"></textarea></p>
HTML;

		return $html;
	}

	/** Present the item result of the survey
	 * @return string HTML for the question */
	public function present_result($surveydata) {
		$id = 'q' . $this->num;
		$commentid = 'q' . $this->num . '_comment';
		$comment = isset($surveydata[$commentid]) ? $surveydata[$commentid] : '';
		$answer = isset($surveydata[$id]) ? $surveydata[$id] : '';

		if($comment === '') {$comment = '&nbsp;';}

		if($answer === 'SA') {
			$this->cnt++;
			$this->cntsa++;
		}

		if($answer === 'A') {
			$this->cnt++;
			$this->cnta++;
		}

		if($answer === 'N') {
			$this->cnt++;
			$this->cntn++;
		}

		if($answer === 'D') {
			$this->cnt++;
			$this->cntd++;
		}

		if($answer === 'SD') {
			$this->cnt++;
			$this->cntsd++;
		}

		$checksa = $answer === 'SA' ? 'checked' : '';
		$checka = $answer === 'A' ? 'checked' : '';
		$checkn = $answer === 'N' ? 'checked' : '';
		$checkd = $answer === 'D' ? 'checked' : '';
		$checksd = $answer === 'SD' ? 'checked' : '';

		$html = <<<HTML
<p>$this->num.
  <label>
    <input type="radio" name="$id" value="SA" id="${id}_sa" $checksa>
    SA</label>
  <label>
    <input type="radio" name="$id" value="A" id="${id}_a" $checka>
    A</label>
  <label>
    <input type="radio" name="$id" value="N" id="${id}_n" $checkn>
    N</label>
  <label>
    <input type="radio" name="$id" value="D" id="${id}_d" $checkd>
    D</label>
  <label>
    <input type="radio" name="$id" value="SD" id="${id}_sd" $checksd>
    SD</label>
$this->text</p>
<p class="comment">$comment</p>
HTML;

		return $html;
	}


	private $num;
	private $text;

	public $desc;		///< Result description text

	public $cnt = 0;	///< Total number of responses
	public $cntsa = 0;	///< Number of results of type SA
	public $cnta = 0;	///< Number of results of type A
	public $cntn = 0;	///< Number of results of type N
	public $cntd = 0;	///< Number of results of type D
	public $cntsd = 0;	///< Number of results of type SD
}
