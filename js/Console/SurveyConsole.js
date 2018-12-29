/**
 * @file
 * Survey system console components
 */

export let SurveyConsole = function() {
}

SurveyConsole.setup = function(Console) {
    Console.tables.add({
        title: 'Survey',
        order: 80,
        api: '/api/survey/tables'
    });
}

