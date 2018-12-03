<?php
/**
 * @file
 * General rating for the instructor/TA
 */

namespace CL\Survey;


/** General rating for the instructor/TA */
class SurveyRate extends SurveyItem {
	/** Constructor
	 * @param int $num Question number
	 * @param string $text Question text
	 */
	public function __construct($num, $text) {
		$this->num = $num;
		$this->text = $text;
	}

	/** Present this survey item as HTML
	 * @return string HTML for item
	 */
	public function present() {
		$id = 'q' . $this->num;
		$html = <<<HTML
<p>$this->num. $this->text</p>
<p><label>
    <input type="radio" name="$id" value="4.0">
    4.0</label>
  <label>
    <input type="radio" name="$id" value="3.0">
    3.0</label>
  <label>
    <input type="radio" name="$id" value="2.0">
    2.0</label>
  <label>
    <input type="radio" name="$id" value="1.0">
    1.0</label>
  <label>
    <input type="radio" name="$id" value="0.0">
    0.0</label>
</p>
HTML;
		return $html;
	}



	/** Present this survey item result as HTML
	 * @returns HTML for item */
	public function present_result($surveydata) {
		$id = 'q' . $this->num;
		$answer = isset($surveydata[$id]) ? $surveydata[$id] : '';
		$check0 = '';
		$check1 = '';
		$check2 = '';
		$check3 = '';
		$check4 = '';
		if($answer === '0.0') {
			$check0 = 'checked';
			$this->cnt++;
			$this->cnt0++;
		}

		if($answer === '1.0') {
			$check1 = 'checked';
			$this->cnt++;
			$this->cnt1++;
		}

		if($answer === '2.0') {
			$check2 = 'checked';
			$this->cnt++;
			$this->cnt2++;
		}

		if($answer === '3.0') {
			$check3 = 'checked';
			$this->cnt++;
			$this->cnt3++;
		}

		if($answer === '4.0') {
			$check4 = 'checked';
			$this->cnt++;
			$this->cnt4++;
		}

		$html = <<<HTML
<p>$this->num. $this->text</p>
<p><label>
    <input type="radio" name="$id" value="4.0" $check4>
    4.0</label>
  <label>
    <input type="radio" name="$id" value="3.0" $check3>
    3.0</label>
  <label>
    <input type="radio" name="$id" value="2.0" $check2>
    2.0</label>
  <label>
    <input type="radio" name="$id" value="1.0" $check1>
    1.0</label>
  <label>
    <input type="radio" name="$id" value="0.0" $check0>
    0.0</label>
</p>
HTML;
		return $html;
	}

	private $num;
	private $text;

	public $cnt = 0;	///< Total count of survy results
	public $cnt0 = 0;	///< Count for survey result 0
	public $cnt1 = 0;	///< Count for survey result 1
	public $cnt2 = 0;	///< Count for survey result 2
	public $cnt3 = 0;	///< Count for survey result 3
	public $cnt4 = 0;	///< Count for survey result 4
}
