import axios from "axios";
import modalHelpers from "../modules/modal.helpers";

class RecommendationModal {

    constructor(modalSelector) {
        this.modalSelector = modalSelector;
    }

    getData(name, callback) {
        axios.get('/recommendation/show', {
            params: {
                name: name
            }
        })
            .then(response => {
                callback(response.data.data);
            })
    }

    renderData(data) {
        const keys = Object.keys(data);

        $(this.modalSelector).find('[html]').each((i, item) => {
            $(item).parent().hide();
        });

        keys.forEach(key => {
            const htmlElem = $(this.modalSelector).find('[html="' + key + '"]');

            if (htmlElem.length > 0) {
                htmlElem.html(data[key]).parent().show();
            }
        });
    }

    renderImage(src) {
        if (src) {
            $(this.modalSelector).find('img').attr('src', src);
            $(this.modalSelector).find('[data-image]').show();
        } else {
            $(this.modalSelector).find('[data-image]').hide();
        }
    }

    modalShow() {
        modalHelpers.show($(this.modalSelector));
    }

    show(name) {
        this.getData(name, (data) => {
            this.renderData(data);
            this.modalShow();
        });
    }

}

export default RecommendationModal