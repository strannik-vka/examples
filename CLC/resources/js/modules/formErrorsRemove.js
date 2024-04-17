$(document)
    .on('input', '.qa-block-error [name]', (e) => {
        $(e.currentTarget).parents('.qa-block-error').removeClass('qa-block-error');
    })
    .on('input', '[data-field-parent] [name]', (e) => {
        $(e.currentTarget).parents('[data-field-parent]').find('.qa-block-error').removeClass('qa-block-error');
    })