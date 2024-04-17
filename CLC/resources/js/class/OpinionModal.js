import axios from "axios";
import modalHelpers from "../modules/modal.helpers";

class OpinionModal {

    constructor(modalSelector) {
        this.modalSelector = modalSelector;
    }

    getData(name, callback) {
        axios.get('/opinions/show', {
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

export default OpinionModal