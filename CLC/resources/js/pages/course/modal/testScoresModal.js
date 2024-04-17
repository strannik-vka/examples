import modalHelpers from "../../../modules/modal.helpers";
import testing from "../block/testing";

const testScoresModal = {
    modal: $('[data-modal-id="testScores"]'),

    show: (props) => {
        testScoresModal.setPoints(props);
        testScoresModal.htmlRender(props);
        testScoresModal.setNextLessonUrl(props);

        modalHelpers.show(testScoresModal.modal);
    },

    setPoints: (props) => {
        $('[data-points]').html(props.userPoints + '/' + props.maxPoints + ' баллов');
    },

    htmlRender: (props) => {
        const percent = 100 / (props.maxPoints / props.userPoints);

        testScoresModal.modal.find('[data-success], [data-error]').hide();

        if (percent > 80) {
            testScoresModal.modal.find('[data-success]').show();

            $('[data-success="end-text"], [data-success="text"]').hide();

            if (props.isCertificateUpdate) {
                $('[data-success="end-text"]').show();
            } else if (props.nextLessonUrl) {
                $('[data-success="text"]').show();
            }
        } else {
            testScoresModal.modal.find('[data-error]').show();
        }
    },

    setNextLessonUrl: (props) => {
        if (props.isCertificateUpdate) {
            testScoresModal.modal.find('[data-next-btn]').attr({
                'href': '/course/' + props.certificate.course_id + '/certificate'
            }).html('Получить сертификат');
        } else if (props.nextLessonUrl) {
            testScoresModal.modal.find('[data-next-btn]').attr('href', props.nextLessonUrl);
        }
    },

    retest: () => {
        modalHelpers.hide(testScoresModal.modal);
        testing.reset();
    }
}

$(document).on('click', '[data-modal-id="testScores"] [data-retest]', testScoresModal.retest)

export default testScoresModal