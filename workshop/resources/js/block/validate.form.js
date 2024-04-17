let modalForm = $('[data-modal-id="soon"]'),
    input = $('#payment_form input');

class Form {
    constructor() {
        if (modalForm) {
            this.events();
        }
    }

    events() {

        input.on('blur input keyup', (e) => {
            this.checkValue(e);
        });

    }

    checkValue(e) {
        if ($.trim($(e.currentTarget).val()) == '') {
            setTimeout(() => {
                $('#payment_form .btn').addClass('disabled');
            }, 250);
        } else {
            setTimeout(() => {
                $('#payment_form .btn').removeClass('disabled');
            }, 250);
        }
    }
}

new Form();