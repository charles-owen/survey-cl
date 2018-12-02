<?php
/**
 * @file
 * View class for a page that allows the user to select among one or more possible surveys.
 */

namespace CL\Survey;


use CL\Site\Site;

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

	public function add(array $surveys) {

	}
}