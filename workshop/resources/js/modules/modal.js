import modalHelpers from "./modal.helpers";

$(document)
    .on('click', '[data-modal-open]', (e) => {
        modalHelpers.show($('[data-modal-id="' + $(e.currentTarget).attr('data-modal-open') + '"]'));
    })
    .on('click', '[btn-close-modal]', (e) => {
        modalHelpers.hide($(e.currentTarget).parents('[data-modal-id]'));
    })
    .on("click", '.modal', (e) => {
        if (!$(e.target).closest(".modal-dialog>*").length) {
            if ($('[data-modal-id].show').length > 0) {
                modalHelpers.hide($('[data-modal-id].show'));
            }
        }
    });

$.fn.extend({
    modal: function (action) {
        if (action == 'show') {
            modalHelpers.show($(this));
        } else if (action == 'hide') {
            modalHelpers.hide($(this));
        }
    }
});

// Открытие модалки по URL
$(() => {
    const urlModal = URLParam('modal');

    if (urlModal) {
        const modalElem = $('[data-modal-id="' + urlModal + '"]');

        if (modalElem.length) {
            modalHelpers.show(modalElem);
        }
    }
})