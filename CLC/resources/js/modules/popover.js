import { createPopper } from '@popperjs/core';

let popovers = {};

const createInstance = (btn) => {
    let id = btn.attr('data-popover-toggle'),
        btnPlacement = btn.attr('data-popover-placement');

    popovers[id] = createPopper(btn[0], $('#' + id)[0], {
        placement: btnPlacement ? btnPlacement : 'bottom-end',
        modifiers: [
            {
                name: 'offset',
                options: {
                    boundary: btn,
                    offset: [0, 20],
                    padding: 8,
                },
            },
            {
                name: 'flip',
                enabled: false,
            },
        ],
    });
}

const destroyInstance = (id) => {
    if (popovers[id]) {
        popovers[id].destroy();
        popovers[id] = null;
    }
}

const showPopper = (btn) => {
    let id = btn.attr('data-popover-toggle');

    $('#' + id).attr('show-popper', '');
    btn.attr('open-popover', 'active');
    btn.addClass('active');

    createInstance(btn);
}

const hidePopper = (btn) => {
    let id = btn.attr('data-popover-toggle');

    $('#' + id).removeAttr('show-popper');
    btn.removeAttr('open-popover');
    btn.removeClass('active');

    destroyInstance(id);
}

const togglePopper = (btn) => {
    if (btn.attr('open-popover') == 'active') {
        hidePopper(btn);
    } else {
        if ($('[open-popover="active"]').length > 0) {
            hidePopper($('[open-popover="active"]'));
        }

        showPopper(btn);
    }
}

$(document)
    .on("click", '[data-popover-toggle]', (e) => {
        e.preventDefault();
        e.stopPropagation();
        togglePopper($(e.currentTarget));
    })
    .on("click", '[popper-close]', (e) => {
        e.preventDefault();
        e.stopPropagation();

        let id = $(e.currentTarget).parents('.popover').attr('id');

        hidePopper($('[data-popover-toggle="' + id + '"]'));
    })
    .on('click', (e) => {
        if (
            $(e.target).closest('[data-popover-toggle]').length == 0 &&
            $(e.target).closest('.popover').length == 0 &&
            $('[open-popover="active"]').length > 0
        ) {
            hidePopper($('[open-popover="active"]'));
        }
    });

export default popovers;