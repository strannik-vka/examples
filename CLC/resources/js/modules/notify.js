import modalHelpers from "./modal.helpers";

export default (options) => {
    if (options.title) {
        $('[data-modal-id="notify"]').find('[data-title]').html(options.title);
    }

    if (options.text) {
        $('[data-modal-id="notify"]').find('[data-text]').html(options.text);
    }

    modalHelpers.show($('[data-modal-id="notify"]'));
}