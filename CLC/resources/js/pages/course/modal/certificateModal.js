import axios from "axios";
import modalHelpers from "../../../modules/modal.helpers";

const certificateModal = {
    modal: $('[data-modal-id="certificateModal"]'),

    show: () => {
        modalHelpers.show(certificateModal.modal);
    },

    setProps: (props) => {
        certificateModal.setTextRender(props);
        certificateModal.setDownloadUrl(props);
    },

    setTextRender: (props) => {
        certificateModal.modal.find('[data-advanced], [data-basic]').hide();

        if (props.isAdvanced) {
            certificateModal.modal.find('[data-advanced]').show();
        } else {
            certificateModal.modal.find('[data-basic]').show();
        }
    },

    setDownloadUrl: (props) => {
        certificateModal.modal.find('[data-url]').attr('href', certificateModal.getDownloadUrl(props.course_id));
    },

    getDownloadUrl: (course_id) => {
        return location.origin + '/course/' + course_id + '/certificate?' + (+new Date());
    },

    accessDownload: (course_id, callback) => {
        axios.get('/course/' + course_id + '/accessDownload')
            .then(response => {
                callback(typeof response.data.success !== 'undefined', response.data);
            })
            .catch(() => {
                callback(false);
            })
    },

    getCourseIdFromURL: (url) => {
        const urlArr = url.split('/course/');

        if (urlArr.length > 0) {
            const courseIdArr = urlArr[1].split('/');

            return courseIdArr[0];
        }

        return null;
    },

    downloadLogic: (courseId) => {
        certificateModal.accessDownload(courseId, (isAccess, response) => {
            if (isAccess) {
                if (certificateModal.modal.length > 0) {
                    certificateModal.setProps(response.certificate);
                    certificateModal.show();
                } else {
                    $('body').append('<a target="_blank" id="tmpUrl" href="' + certificateModal.getDownloadUrl(courseId) + '"></a>');
                    $('#tmpUrl')[0].click();
                    $('#tmpUrl').remove();
                }
            } else if (response.opinionUrl) {
                modalHelpers.show($('[data-modal-id="certificateOpinionModal"]'));
                $('[data-modal-id="certificateOpinionModal"]')
                    .find('[data-url]').attr('href', response.opinionUrl);
            }
        })
    },

    downloadClickEvent: () => {
        $(document)
            .on('click', '[href*="/certificate"]', (e) => {
                if (
                    $(e.currentTarget).parents('[data-modal-id="certificateModal"]').length == 0 &&
                    $(e.currentTarget).attr('id') != 'tmpUrl'
                ) {
                    const courseId = certificateModal.getCourseIdFromURL($(e.currentTarget).attr('href'));

                    if (courseId) {
                        e.preventDefault();
                        certificateModal.downloadLogic(courseId);
                    }
                }
            })
    }
}

export default certificateModal