import modalHelpers from "./modal.helpers";

$(document)
    .on('click', '[data-modal-open]', (e) => {
        modalHelpers.show($('[data-modal-id="' + $(e.currentTarget).attr('data-modal-open') + '"]'));
    })
    .on('click', '[btn-close-modal]', (e) => {
        modalHelpers.hide($(e.currentTarget).parents('[data-modal-id]'));
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