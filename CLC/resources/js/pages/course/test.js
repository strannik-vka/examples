// modules
import '../../modules/popover';

import './playlist';
import fillProgress from './progress';
import '../../../../../js-modules/otherVariant';
import CountTitles from '../../../../../js-modules/CountTitles';
import AjaxForm from '../../../../../js-modules/AjaxForm';

$(document)
    .on('change', '.qa-block-error [name]', (e) => {
        $(e.currentTarget).parents('.qa-block-error').removeClass('qa-block-error');
    })
    .on('click', '[data-retest-btn]', (e) => {
        e.preventDefault();
        $('#answerResultModal').modal('hide');
        formReset();
        return false;
    });

let isFormRest = false;
const formReset = () => {
    isFormRest = true;
    $('#test [name]').prop('checked', false).trigger('change');
    $('#test [type="submit"]').text('Отправить');
}

const formTest = () => {
    let result = true;

    if (window.globalVar.isAnswer && isFormRest == false) {
        formReset();
        return false;
    }

    $('.qa-block-error').removeClass('qa-block-error');

    $('#test [data-field]').each((i, item) => {
        let input = $(item).find('[name]:eq(0)'),
            fill = false;

        if (input.attr('type') == 'checkbox' || input.attr('type') == 'radio') {
            fill = $(item).find('[name]:checked').length;
        }

        if (!fill) {
            result = false;
            $(item).addClass('qa-block-error');
        }
    });

    scroller.to($('.qa-block-error:eq(0)'));

    return result;
}

new AjaxForm('#test', {
    beforeSubmit: (callback) => {
        callback(formTest())
    }
})

$('#test').on('ajax-response-success', () => {
    if (typeof window.AjaxFormData === 'object' && window.AjaxFormData != null) {
        let testNumber = $('[data-test-item="' + window.AjaxFormData.testId + '"]').attr('data-number'),
            resultText = '';

        if (window.AjaxFormData.tesultTexts) {
            let rows = window.AjaxFormData.tesultTexts.split("\n");
            for (let i = 0; i < rows.length; i++) {
                let row = $.trim(rows[i]),
                    numbers = row.substr(0, row.indexOf(' ')),
                    text = $.trim(row.substr(row.indexOf(' '))),
                    number = 0;

                numbers = numbers.split('-');
                numbers = numbers.map(item => {
                    return parseFloat(item);
                });

                text = $.trim(text.substr(text.indexOf(' ')));

                number = numbers.length > 1 ? numbers[1] : numbers[0];

                if (window.AjaxFormData.correctsCount <= number) {
                    resultText = text;
                    break;
                }
            }
        }

        // Завершение модуля
        $('#answerResultModal [data-corrects-count]').html(window.AjaxFormData.correctsCount + ' ' + CountTitles(window.AjaxFormData.correctsCount, ['балл', 'балла', 'баллов']));
        $('#answerResultModal [data-module-number]').html(testNumber);
        $('#answerResultModal [data-module-result]').html(resultText);
        $('#answerResultModal [data-module-ne]').html(' ');
        $('#answerResultModal [data-passed-show]').show();
        if (!window.AjaxFormData.isPassed) {
            $('#answerResultModal [data-module-ne]').html(' не ');
            $('#answerResultModal [data-passed-show]').hide();
        }

        // Завершение курса
        $('[data-course-result]').hide();
        if (window.AjaxFormData.sumTestResultPoints <= 10) {
            $('[data-course-result="1"]').show();
        } else if (window.AjaxFormData.sumTestResultPoints <= 25) {
            $('[data-course-result="2"]').show();
        } else if (window.AjaxFormData.sumTestResultPoints <= 45) {
            $('[data-course-result="3"]').show();
        } else {
            $('[data-course-result="4"]').show();
        }

        $('[data-course-points]').html(window.AjaxFormData.sumTestResultPoints + ' ' + CountTitles(window.AjaxFormData.sumTestResultPoints, ['балл', 'балла', 'баллов']));

        $('[data-course-ne]').html(' ');
        if (window.AjaxFormData.sumTestResultPoints <= 25) {
            $('[data-course-ne]').html(' не ');
        }

        $('#answerResultModal').modal('show');

        // Последний тест
        window.globalVar.testsPassed = window.AjaxFormData.isLastTest && window.AjaxFormData.isPassed;

        window.globalVar.progressMap = window.AjaxFormData.progressMap;
        fillProgress(window.globalVar.progressMap);

        $(document).trigger('ajax.update');
    }
});