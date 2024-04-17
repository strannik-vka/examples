// js-modules
import '../../../../../js-modules/file_change';
import '../../../../../js-modules/text_count';
import '../../../../../js-modules/textarea_autosize';
import '../../../../../js-modules/otherVariant';
import AjaxForm from '../../../../../js-modules/AjaxForm';

// modules
import '../../modules/popover';
import '../../modules/formErrorsRemove';

import './playlist';
import fillProgress from './progress';
import testScoresModal from './modal/testScoresModal';
import testing from './block/testing';
import modalHelpers from '../../modules/modal.helpers';
import { formPollRequired } from '../../modules/formPollRequired';

// Установка статуса "пройдено"
const setLessonPassed = () => {
    if (
        window?.globalVar?.lesson?.id &&
        window?.globalVar?.lesson?.passed == false
    ) {
        ajax({
            url: '/course/setPassed',
            type: 'post',
            data: {
                lesson_id: window.globalVar.lesson.id
            }
        }, (response) => {
            window.globalVar.lesson.passed = true;

            // Обновление прогрессбара
            window.globalVar.progressMap = response.progressMap;
            fillProgress(window.globalVar.progressMap);

            // Обновление html
            $(document).trigger('ajax.update');
        });
    }
}

// Клик на видео
if ($('iframe').length) {
    window.focus();
    window.addEventListener("blur", () => {
        setTimeout(() => {
            if (document.activeElement.tagName === "IFRAME") {
                setLessonPassed();
            }
        });
    });

    // Получение ссылки на видео для кнопки
    let link = $('iframe').attr('src');

    $('[link-to-video]').attr('href', link);
} else {
    setLessonPassed();
}

// test show
$(document)
    .on('click', '[data-retest-btn]', (e) => {
        e.preventDefault();
        $('#answerResultModal').modal('hide');
        testing.reset();

        return false;
    });

const formTest = () => {
    if ($('iframe').length && window?.globalVar?.lesson?.passed == false) {
        modalHelpers.show($('[data-modal-id="videoFinishModal"]'));
        return false;
    }

    if (window.globalVar.isAnswer && window.isFormRest != true) {
        testing.reset();
        return false;
    }

    return formPollRequired($('#test [data-field]'))
}

new AjaxForm('#test', {
    beforeSubmit: (callback) => {
        callback(formTest())
    }
})

$('#test').on('ajax-response-success', () => {
    if (typeof window.AjaxFormData === 'object' && window.AjaxFormData != null) {
        const response = window.AjaxFormData;

        // Обновление прогрессбара
        window.globalVar.progressMap = response.progressMap;
        fillProgress(window.globalVar.progressMap);

        window.globalVar.isAnswer = true;

        // Обновление html
        $(document).trigger('ajax.update');

        if (response.maxPoints > 0) {
            testScoresModal.show(response);
        } else {
            if (response.nextLessonUrl) {
                $('[data-next-lesson-url]').attr('href', response.nextLessonUrl);
                modalHelpers.show($('[data-modal-id="workFinishModal"]'));
            }
        }
    }
});

$('[data-modal-id="videoFinishModal"]').on('hidden', () => {
    setTimeout(() => {
        if ($(window).width() >= 1200) {
            scroller.to($('#desktop-video'), false, -18);
        } else {
            scroller.to($('#mobile-video'), false, -18);
        }
    }, 400)
})