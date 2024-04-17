export const formPollRequired = (fieldElems) => {
    let result = true;

    $('.qa-block-error').removeClass('qa-block-error');

    fieldElems.each((i, item) => {
        let parent = $(item).parents('[data-field-parent]'),
            itemElem = parent.length ? parent : $(item),
            input = itemElem.find('[name]:eq(0)'),
            fill = input.length ? false : true;

        if (input.length) {
            if (input.attr('type') == 'checkbox' || input.attr('type') == 'radio') {
                fill = itemElem.find('[name]:checked').length;
            } else if (input.attr('type') == 'text') {
                fill = $.trim(input.val());
            }

            if (!fill) {
                result = false;
                $(item).addClass('qa-block-error');
            }
        }
    });

    scroller.to($('.qa-block-error:eq(0)'));

    return result;
}