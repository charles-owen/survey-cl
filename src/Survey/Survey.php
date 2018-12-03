<?php
/** @file
 * Base class for surveys
 */

/** Classes associated with online surveys */
namespace CL\Survey;

use CL\Site\Util\Tags;
use CL\Site\Site;
use CL\Users\User;


/**
 * Class the defines an online survey
 */
class Survey {

	/**
	 * Constructor
	 * @param string $tag The survey tag
	 * @param string $title The survey title (if null can be specified later)
	 */
	public function __construct($tag, $title=null) {
		$this->tag = $tag;
		$this->title = $title;
	}

	/**
	 * Property get magic method
	 *
	 * <b>Properties</b>
	 * Property | Type | Description
	 * -------- | ---- | -----------
	 *
	 * @param string $property Property name
	 * @return mixed
	 */
	public function __get($property) {
		switch($property) {
			case 'title':
				return $this->title;

			case 'css':
				return $this->css;

			case 'redirect':
				return $this->redirect;

			case 'anonymous':
				return $this->anonymous;

			default:
				$trace = debug_backtrace();
				trigger_error(
					'Undefined property ' . $property .
					' in ' . $trace[0]['file'] .
					' on line ' . $trace[0]['line'],
					E_USER_NOTICE);
				return null;
		}
	}

	/**
	 * Property set magic method
	 *
	 * <b>Properties</b>
	 * Property | Type | Description
	 * -------- | ---- | -----------
	 *
	 * @param string $property Property name
	 * @param mixed $value Value to set
	 */
	public function __set($property, $value) {
		switch($property) {
			case 'css':
				$this->css = $value;
				break;

			case 'redirect':
				$this->redirect = $value;
				break;

			case 'anonymous':
				$this->anonymous = $value;
				break;

			default:
				$trace = debug_backtrace();
				trigger_error(
					'Undefined property ' . $property .
					' in ' . $trace[0]['file'] .
					' on line ' . $trace[0]['line'],
					E_USER_NOTICE);
				break;
		}
	}



	/** Add a survey item to this survey during construction
	 * @param SurveyItem $item Item to add to the survey */
	public function add(SurveyItem $item) {
		$this->items[] = $item;
	}

	/** Present survey for user data input
	 * @return string HTML for the survey */
	public function present(Site $site) {
		$url = $site->root . '/cl/api/survey/submit/' . $this->tag;
		$redirect = $site->root . $this->redirect;

		$html = <<<HTML
<div class="cl-survey">
<form class="cl-submitter" method="post" action="$url" data-redirect="$redirect">
HTML;

		foreach($this->items as $item) {
			$html .= $item->present();
		}

		$html .= <<<HTML
<p><input type="submit" name="submit" id="submit" value="Submit"></p>
</form>
</div>
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
<div class="cl-survey">	
<hr />
<form>
HTML;

		foreach($this->items as $item) {
			$html .= $item->present_result($surveydata);
		}

		$html .= <<<HTML
</form>
</div>
HTML;

		return $html;
	}


	/**
	 * The survey view calls this after loading, so the survey can be built
	 * with a passed in Site object if necessary.
	 * @param Site $site
	 */
	public function build(Site $site) {
	}

	/**
	 * Load a survey from the standard surveys location (config/survey/:tag)
	 * @param Site $site
	 * @param $tag
	 * @return mixed|null
	 */
	public static function load(Site $site, $tag) {
		if(!Tags::validate($tag)) {
			return null;
		}

		$path = $site->rootDir . '/' . $site->config . '/survey/' . $tag . '.php';
		$survey = @include($path);
		if($survey === false) {
			return null;
		}

		if(!($survey instanceof Survey)) {
			return null;
		}

		$survey->build($site);
		return $survey;
	}

	/**
	 * Create the statistics report heading. Override for custom headings.
	 * @param Site $site
	 * @return string HTML
	 */
	public function reportHeading(Site $site) {
		return '';
	}


	/**
	 * Generate a block of statistics for the first page of the report.
	 *
	 * Must be called after present_result() has been called for all survey categories.
	 *
	 * @param Site $site The Site object
	 * @return string HTML
	 */
	public function statistics(Site $site) {
		$html = $this->reportHeading($site);

		$html .= <<<HTML
<table class="stats">
<tr><th rowspan="3">&nbsp;</th><th colspan="10">Student Responses</th>
<th colspan="3" rowspan="2">Item Statistics</th></tr>
<tr><th colspan="2">SA(1)</th><th colspan="2">A(2)</th>
<th colspan="2">N(3)</th><th colspan="2">D(4)</th><th colspan="2">SD(5)</th>
</tr>
<tr><th>N</th><th>%</th><th>N</th><th>%</th><th>N</th><th>%</th><th>N</th><th>%</th><th>N</th><th>%</th>
<th>Mean</th><th>Std</th><th>N</th></tr>
HTML;

		$num = 0;
		$cnt = 0;
		$cntsa = 0;  $cnta = 0;  $cntn = 0; $cntd = 0; $cntsd = 0;
		$totaled = false;
		foreach($this->items as $item) {
			if($item instanceof SurveyQuestion) {
				$num++;
				$cnt += $item->cnt;
				$cntsa += $item->cntsa;
				$cnta += $item->cnta;
				$cntn += $item->cntn;
				$cntd += $item->cntd;
				$cntsd += $item->cntsd;

				$html .= <<<HTML
<tr>
<th class="lefthead">Item $num: $item->desc</th>
HTML;
				$html .= $this->statistic($item->cntsa, $item->cnt);
				$html .= $this->statistic($item->cnta, $item->cnt);
				$html .= $this->statistic($item->cntn, $item->cnt);
				$html .= $this->statistic($item->cntd, $item->cnt);
				$html .= $this->statistic($item->cntsd, $item->cnt);
				$html .= $this->meanstd($item->cntsa, $item->cnta, $item->cntn, $item->cntd, $item->cntsd);

				$html .= <<<HTML
</tr>		
HTML;
			} else if(!$totaled && $num > 0) {
				$totaled = true;

				$html .= <<<HTML
<tr>
<th class="lefthead">Items 1-$num: Overall</th>
HTML;

				$html .= $this->statistic($cntsa, $cnt);
				$html .= $this->statistic($cnta, $cnt);
				$html .= $this->statistic($cntn, $cnt);
				$html .= $this->statistic($cntd, $cnt);
				$html .= $this->statistic($cntsd, $cnt);
				$html .= $this->meanstd($cntsa, $cnta, $cntn, $cntd, $cntsd);

				$html .= <<<HTML
</tr>		
HTML;

			}

			if($item instanceof SurveyRate) {
				$num++;

				$html .= <<<HTML
<tr>
<th class="lefthead">Item $num: Rating on 4-pt scale</th>
HTML;

				$html .= $this->statistic($item->cnt1, $item->cnt);
				$html .= $this->statistic($item->cnt2, $item->cnt);
				$html .= $this->statistic($item->cnt3, $item->cnt);
				$html .= $this->statistic($item->cnt4, $item->cnt);
				$html .= $this->statistic(0, $item->cnt);
				$html .= $this->meanstd($item->cnt1, $item->cnt2, $item->cnt3, $item->cnt4, 0);

				$html .= <<<HTML
</tr>		
HTML;
			}


		}

		$html .= <<<HTML
</table></div>
HTML;

		return $html;
	}


	private function statistic($num, $total) {
		if($num == 0) {
			return "<td>.</td><td>.</td>";
		} else {
			$per = sprintf("%5.2f", $num / $total);
			return "<td>$num</td><td>$per</td>";
		}
	}

	private function meanstd($a, $b, $c, $d, $e) {
		$tot = $a + $b + $c + $d + $e;
		if($tot <= 1) {
			return "<td>.</td><td>.</td><td>.</td>";
		}

		$mean = ($a * 1 + $b * 2 + $c * 3 + $d * 4 + $e * 5) / $tot;
		$std = sqrt((1 / ($tot - 1)) * (pow(1 - $mean, 2) * $a+
				pow(2 - $mean, 2) * $b +
				pow(3 - $mean, 2) * $c +
				pow(4 - $mean, 2) * $d +
				pow(5 - $mean, 2) * $e));
		$meanf = sprintf("%4.2f", $mean);
		$stdf = sprintf("%4.2f", $std);

		return "<td>$meanf</td><td>$stdf</td><td>$tot</td>";
	}


	protected $tag;				///< The survey tag
	private $title;     // Title that describes the survey
	private $css = null;       // Optional CSS for this survey
	private $items = array();	///< The survey items in order
	private $redirect = '/';    // Redirect after survey completion
	private $anonymous = true;  // Is the survey anonymous?
}

