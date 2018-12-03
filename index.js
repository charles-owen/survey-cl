/**
 * @file
 * The main Survey system entry point
 */

//
// Install the console components
//
import {SurveyConsole} from './js/Console/SurveyConsole';

if(Site.Console !== undefined) {
	SurveyConsole.setup(Site.Console);
}
