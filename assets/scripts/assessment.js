$(function () {
    "use strict";

    var index = 0;
    var questions;

    function addAssessment()
    {
        var html = '<div id="question">' +
            '<div class="question-text">' +
            '</div>' +
            '<a class="question-button no-button">Not Me</a>' +
            '<a class="question-button yes-button">That\'s Me</a>' +
            '</div>' +
            '<div id="assessment-progress"></div>' +
            '<div id="assessment-message"></div>';
        $('#assessment').html(html);
        $('#assessment').find('.no-button').on('click', function () {
            questions[index].answer = 0;
        });
        $('#assessment').find('.yes-button').on('click', function () {
            questions[index].answer = 1;
        });
        $('#assessment .question-button').on('click', function () {
            var percentage;
            index += 1;
            percentage = Math.ceil(index / questions.length * 100);
            $('#assessment-progress').progressbar({
                value: percentage
            });
            $('.question-text, #assessment-message').fadeTo('fast', 0, function () {
                if (index < questions.length) {
                    showQuestion();
                } else {
                    html = '<form action="assessment_results.php" ' +
                        'id="results" method="POST">';
                    $.each(questions, function (i) {
                        html += '<input name="q';
                        if (i < 9) {
                            html += '0';
                        }
                        html += (i + 1) + '" type="hidden" value="' +
                            this.answer + '">';
                    });
                    html += '</form>';
                    $('body').append(html);
                    $('#assessment-progress, #question').fadeOut(function () {
                          $('#results').submit();
                    });
                }
            });
        });
        $('#assessment-progress').progressbar({
            value: 0
        });
        showQuestion();
    }
    
    function showQuestion()
    {
        var question = questions[index],
            text;
        text = (index + 1) + ') ' + question.ques_text + '.';
        $('.question-text').text(text)
            .fadeTo('fast', 100);
        $('#assessment-message').text(question.ques_msg)
            .fadeTo('fast', 100);
    }

    $.getJSON(
	    'get_questions.php',
        function (data) {
            questions = data;
			setTimeout(addAssessment, 1000);
            addAssessment();
        }
    );
});
