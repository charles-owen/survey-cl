<?php
/** @file
 * Base class for surveys
 */

/** Classes associated with online surveys */
namespace CL\Survey;

/**
 * Class the defines an online survey
 */
class Survey {

	/** Constructor
	 * @param string $tag The survey tag */
	public function __construct($tag) {
		$this->tag = $tag;
	}

	/** Add a survey item to this survey during construction
	 * @param SurveyItem $item Item to add to the survey */
	public function add(SurveyItem $item) {
		$this->items[] = $item;
	}

	/** Present survey for user data input
	 * @return string HTML for the survey */
	public function present() {
		$html = <<<HTML
<form id="form" name="form" method="post" action="survey-post.php">		
HTML;

		foreach($this->items as $item) {
			$html .= $item->present();
		}

		$html .= <<<HTML
<p><input type="submit" name="submit" id="submit" value="Submit"></p>
</form>	
HTML;

		return $html;
	}

	/**
	 * Present survey result
	 * @param $surveydata Data for this survey
	 * @return string HTML for the survey result
	 */
	public function present_result($surveydata) {
		$html = '';

		$html = <<<HTML
<hr />
<form>
HTML;

		foreach($this->items as $item) {
			$html .= $item->present_result($surveydata);
		}

		$html .= <<<HTML
</form>
HTML;

		return $html;
	}

	/** Get the survey items
	 * @return Survey items array */
	public function get_items() {
		return $this->items;
	}

	protected $tag;				///< The survey tag
	private $items = array();	///< The survey items in order
}


//
//
///** Survey item that is HTML content */
//class SurveyHTML extends SurveyItem {
//	/** Constructor
//	 * @param $html HTML for the survey item */
//	public function __construct($html) {
//		$this->html = $html;
//	}
//
//	/** Present this survey item
//	 * @return HTML */
//	public function present() {
//		return $this->html;
//	}
//
//	/** Present this survey item result
//	 * @return HTML */
//	public function present_result($surveydata) {
//		return $this->html;
//	}
//
//	private $html;
//}
//
///** Present a question for the survey */
//class SurveyQuestion extends SurveyItem {
//	/** Constructor
//	 * @param $num Question number
//	 * @param $text Question text
//	 * @param $desc Survey question description for result */
//	public function __construct($num, $text, $desc=null) {
//		$this->num = $num;
//		$this->text = $text;
//		$this->desc = $desc;
//	}
//
//	/** Present the item on the survey
//	 * @returns HTML for the question */
//	public function present() {
//		$id = 'q' . $this->num;
//		$commentid = 'q' . $this->num . '_comment';
//
//		$html = <<<HTML
//<p>$this->num.
//  <label>
//    <input type="radio" name="$id" value="SA" id="${id}_sa">
//    SA</label>
//  <label>
//    <input type="radio" name="$id" value="A" id="${id}_a">
//    A</label>
//  <label>
//    <input type="radio" name="$id" value="N" id="${id}_n">
//    N</label>
//  <label>
//    <input type="radio" name="$id" value="D" id="${id}_d">
//    D</label>
//  <label>
//    <input type="radio" name="$id" value="SD" id="${id}_sd">
//    SD</label>
//$this->text</p>
//<p><textarea rows="4" cols="60" id="$commentid" name="$commentid"></textarea></p>
//HTML;
//
//		return $html;
//	}
//
//	/** Present the item result of the survey
//	 * @returns HTML for the question */
//	public function present_result($surveydata) {
//		$id = 'q' . $this->num;
//		$commentid = 'q' . $this->num . '_comment';
//		$comment = isset($surveydata[$commentid]) ? $surveydata[$commentid] : '';
//		$answer = isset($surveydata[$id]) ? $surveydata[$id] : '';
//
//		if($comment === '') {$comment = '&nbsp;';}
//
//		$checksa = '';
//		$checka = '';
//		$checkn = '';
//		$checkd = '';
//		$checkds = '';
//
//		if($answer === 'SA') {
//			$this->cnt++;
//			$this->cntsa++;
//			$checksa = 'checked';
//		}
//
//		if($answer === 'A') {
//			$this->cnt++;
//			$this->cnta++;
//			$checka = 'checked';
//		}
//
//		if($answer === 'N') {
//			$this->cnt++;
//			$this->cntn++;
//			$checkn = 'checked';
//		}
//
//		if($answer === 'D') {
//			$this->cnt++;
//			$this->cntd++;
//			$checkd = 'checked';
//		}
//
//		if($answer === 'SD') {
//			$this->cnt++;
//			$this->cntsd++;
//			$checksd = 'checked';
//		}
//
//		$checksa = $answer === 'SA' ? 'checked' : '';
//		$checka = $answer === 'A' ? 'checked' : '';
//		$checkn = $answer === 'N' ? 'checked' : '';
//		$checkd = $answer === 'D' ? 'checked' : '';
//		$checksd = $answer === 'SD' ? 'checked' : '';
//
//		$html = <<<HTML
//<p>$this->num.
//  <label>
//    <input type="radio" name="$id" value="SA" id="${id}_sa" $checksa>
//    SA</label>
//  <label>
//    <input type="radio" name="$id" value="A" id="${id}_a" $checka>
//    A</label>
//  <label>
//    <input type="radio" name="$id" value="N" id="${id}_n" $checkn>
//    N</label>
//  <label>
//    <input type="radio" name="$id" value="D" id="${id}_d" $checkd>
//    D</label>
//  <label>
//    <input type="radio" name="$id" value="SD" id="${id}_sd" $checksd>
//    SD</label>
//$this->text</p>
//<p class="comment">$comment</p>
//HTML;
//
//		return $html;
//	}
//
//
//	private $num;
//	private $text;
//
//	public $desc;		///< Result description text
//
//	public $cnt = 0;	///< Total number of responses
//	public $cntsa = 0;	///< Number of results of type SA
//	public $cnta = 0;	///< Number of results of type A
//	public $cntn = 0;	///< Number of results of type N
//	public $cntd = 0;	///< Number of results of type D
//	public $cntsd = 0;	///< Number of results of type SD
//}
//
///** A comment area for the survey. */
//class SurveyComment extends SurveyItem {
//	/** Constructor
//	 * @param $tag Surey item tag
//	 * @param $text Text for the survey item description */
//	public function __construct($tag, $text) {
//		$this->tag = $tag;
//		$this->text = $text;
//	}
//
//	/** Present this survey item as HTML
//	 * @returns HTML for item */
//	public function present() {
//		$html = <<<HTML
//<p>$this->text</p>
//<p><textarea rows="4" cols="60" id="$this->tag" name="$this->tag"></textarea></p>
//HTML;
//
//		return $html;
//	}
//
//	/** Present this survey item result as HTML
//	 * @returns HTML for item */
//	public function present_result($surveydata) {
//		$comment = isset($surveydata[$this->tag]) ? $surveydata[$this->tag] : '';
//		if($comment === '') {$comment = '&nbsp;';}
//
//		$html = <<<HTML
//<p>$this->text</p>
//<p class="comment">$comment</p>
//HTML;
//
//		return $html;
//	}
//
//	private $tag;
//	private $text;
//}
//
///** General rating for the instructor/TA */
//class SurveyRate extends SurveyItem {
//	/** Constructor
//	 * @param $num Question number
//	 * @param $text Question text */
//	public function __construct($num, $text) {
//		$this->num = $num;
//		$this->text = $text;
//	}
//
//	/** Present this survey item as HTML
//	 * @returns HTML for item */
//	public function present() {
//		$id = 'q' . $this->num;
//		$html = <<<HTML
//<p>$this->num. $this->text</p>
//<p><label>
//    <input type="radio" name="$id" value="4.0">
//    4.0</label>
//  <label>
//    <input type="radio" name="$id" value="3.0">
//    3.0</label>
//  <label>
//    <input type="radio" name="$id" value="2.0">
//    2.0</label>
//  <label>
//    <input type="radio" name="$id" value="1.0">
//    1.0</label>
//  <label>
//    <input type="radio" name="$id" value="0.0">
//    0.0</label>
//</p>
//HTML;
//		return $html;
//	}
//
//	/** Present this survey item result as HTML
//	 * @returns HTML for item */
//	public function present_result($surveydata) {
//		$id = 'q' . $this->num;
//		$answer = isset($surveydata[$id]) ? $surveydata[$id] : '';
//		$check0 = '';
//		$check1 = '';
//		$check2 = '';
//		$check3 = '';
//		$check4 = '';
//		if($answer === '0.0') {
//			$check0 = 'checked';
//			$this->cnt++;
//			$this->cnt0++;
//		}
//
//		if($answer === '1.0') {
//			$check1 = 'checked';
//			$this->cnt++;
//			$this->cnt1++;
//		}
//
//		if($answer === '2.0') {
//			$check2 = 'checked';
//			$this->cnt++;
//			$this->cnt2++;
//		}
//
//		if($answer === '3.0') {
//			$check3 = 'checked';
//			$this->cnt++;
//			$this->cnt3++;
//		}
//
//		if($answer === '4.0') {
//			$check4 = 'checked';
//			$this->cnt++;
//			$this->cnt4++;
//		}
//
//		$html = <<<HTML
//<p>$this->num. $this->text</p>
//<p><label>
//    <input type="radio" name="$id" value="4.0" $check4>
//    4.0</label>
//  <label>
//    <input type="radio" name="$id" value="3.0" $check3>
//    3.0</label>
//  <label>
//    <input type="radio" name="$id" value="2.0" $check2>
//    2.0</label>
//  <label>
//    <input type="radio" name="$id" value="1.0" $check1>
//    1.0</label>
//  <label>
//    <input type="radio" name="$id" value="0.0" $check0>
//    0.0</label>
//</p>
//HTML;
//		return $html;
//	}
//
//	private $num;
//	private $text;
//
//	public $cnt = 0;	///< Total count of survy results
//	public $cnt0 = 0;	///< Count for survey result 0
//	public $cnt1 = 0;	///< Count for survey result 1
//	public $cnt2 = 0;	///< Count for survey result 2
//	public $cnt3 = 0;	///< Count for survey result 3
//	public $cnt4 = 0;	///< Count for survey result 4
//}
//
//
