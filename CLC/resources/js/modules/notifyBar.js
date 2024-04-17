import { createPopper } from '@popperjs/core';
import axios from 'axios';

const ICONS = {
    1: 'notification-icon-start',
    2: 'notification-icon-result',
    3: 'notification-icon-course',
    4: 'notification-icon-open',
    5: 'notification-icon-congratulations',
    6: 'notification-icon-open',
    7: 'notification-icon-result',
}

const counterShow = () => {
    $('[data-notify-count]').show();
}

const counterHide = () => {
    $('[data-notify-count]').hide();
}

const setRead = () => {
    axios.post('/notifications/read');

    counterHide();
}

const onPrint = () => {
    let isNotifyNew = $('[items-list-notify-new]').html(),
        isNotify = $('[items-list-notify]').html();

    if (isNotifyNew) {
        $('[data-block-notify-new]').show();

        counterShow();
    }

    if (isNotify) {
        $('[data-block-notify]').show();
    }

    if (isNotifyNew || isNotify) {
        $('[data-block-notify-empty]').hide();
    }
}

const onHtml = (html, data) => {
    html.find('[data-icon]').addClass(ICONS[data.type_id]);

    return html;
}

items.create({
    name: 'notify-new',
    scroll: true,
    first_load: true,
    onPrint: onPrint,
    html: onHtml
});

items.create({
    name: 'notify',
    scroll: true,
    first_load: true,
    onPrint: onPrint,
    html: onHtml
});

let popperInstance = null;
const notifyBtn = document.querySelector('#notify-btn');
const notifyClose = document.querySelector('[popper-close]');
const notifyBar = document.querySelector('.notify-bar');

if (notifyBar) {
    notifyBtn.addEventListener("click", function (e) {
        e.preventDefault();
        togglePopper();
    });

    notifyClose.addEventListener("click", function (e) {
        e.preventDefault();
        hidePopper();
    });

    function createInstance() {
        popperInstance = createPopper(notifyBtn, notifyBar, {
            placement: 'bottom',
            modifiers: [
                {
                    name: 'offset',
                    options: {
                        boundary: notifyBtn,
                        offset: [-25, 20],
                    },
                },
            ],
        });
    }

    function destroyInstance() {
        if (popperInstance) {
            popperInstance.destroy();
            popperInstance = null;
        }
    }

    function showPopper() {
        notifyBar.setAttribute('show-popper', '');
        notifyBtn.setAttribute('open-notify-bar', 'active');
        notifyBtn.classList.add('active');
        createInstance();

        setRead();
    }

    function hidePopper() {
        notifyBar.removeAttribute('show-popper');
        notifyBtn.removeAttribute('open-notify-bar', 'active');
        notifyBtn.classList.remove('active');
        destroyInstance();
    }

    function togglePopper() {
        if (notifyBtn.hasAttribute('open-notify-bar', 'active')) {
            hidePopper();
        } else {
            showPopper();
        }
    }
}