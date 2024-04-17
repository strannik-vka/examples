import axios from 'axios';
import VerifyCode from '../../../../../js-modules/VerifyCode';

const RESENDING_SECONDS = 60;
let CURRENT_SECONDS = RESENDING_SECONDS;
let isResendingAjax = false;

let ActivateCode = new VerifyCode('[data-code-form]');

const preloaderShow = () => {
    $('[data-code-form]').hide();
    $('[data-code-preloader]').show();
}

const preloaderHide = () => {
    $('[data-code-form]').show();
    $('[data-code-preloader]').hide();
}

const secondsStart = () => {
    CURRENT_SECONDS = RESENDING_SECONDS;

    const secondsPaste = () => {
        if (CURRENT_SECONDS) {
            $('[data-code-seconds]').html(' через ' + (CURRENT_SECONDS > 9 ? CURRENT_SECONDS : '0' + CURRENT_SECONDS));
        } else {
            $('[data-code-seconds]').html('');
        }
    }

    secondsPaste();

    let secondsInterval = setInterval(() => {
        CURRENT_SECONDS--;

        secondsPaste();

        if (CURRENT_SECONDS == 0) {
            clearInterval(secondsInterval);
        }
    }, 1000);
}

ActivateCode.onChange = () => {
    $('[data-code-error]').html('').hide();
}

ActivateCode.onFill = (code) => {
    preloaderShow();

    axios.post('/verify-code/check', {
        code: code
    }).then(response => {
        if (response.data.success) {
            location.href = response.data.redirect;
        } else if (response.data.error) {
            preloaderHide();

            $('[data-code-error]').html(response.data.error).show();
        }
    }).catch(error => {
        preloaderHide();

        if (error.response && error.response.statusText && error.response.statusText.indexOf('Too Many Requests') > -1) {
            $('[data-code-error]').html('В минуту разрешено 6 проверок кода, пожалуйста повторите через минуту').show();
        } else {
            location.reload();
        }
    })
}

ActivateCode.focus();

secondsStart();

$(document).on('click', '[data-code-resend]', () => {
    if (isResendingAjax == false && CURRENT_SECONDS == 0) {
        isResendingAjax = true;

        secondsStart();

        axios.post('/verify-code/store')
            .catch(error => {
                if (error.response && error.response.statusText && error.response.statusText.indexOf('Too Many Requests') > -1) {
                    $('[data-code-error]').html('В минуту разрешено отправлять один код, пожалуйста повторите через минуту').show();
                } else {
                    location.reload();
                }
            })
            .finally(() => {
                isResendingAjax = false;
            })
    }
})