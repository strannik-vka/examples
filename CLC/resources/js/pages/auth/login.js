import InputsNavigate from '../../../../../js-modules/InputsNavigate';

class Login {

    constructor() {
        this.errors = {};
        this.validateTimeOut = false;

        this.form = $('[data-ajax-form="login"]');

        this.form
            .on('change', '[name]', (e) => {
                this.check(e);
            })
            .on('ajax-response', () => {
                if (this.form.find('[name].is-invalid')) {
                    $('.form-auth-btn').addClass('is-invalid');
                } else {
                    $('.form-auth-btn').removeClass('is-invalid');
                }
            });
    }

    rules() {
        return {
            email: 'required|email',
            password: 'required|min:8'
        };
    }

    currentRule(e) {
        var rules = this.rules(),
            name = typeof e === 'string' ? e : $(e.currentTarget).attr('name'),
            result = {};

        result[name] = rules[name];

        return result;
    }

    isErrors() {
        return Object.keys(this.errors).length;
    }

    check(e, callback) {
        if (this.validateTimeOut) clearTimeout(this.validateTimeOut);

        this.validateTimeOut = setTimeout(() => {
            this.errors = validate.check(this.form, this.currentRule(e), true);

            if (callback) {
                callback(this.errors);
            }
        }, 100);
    }

}

let LoginClass = new Login();

InputsNavigate.onClick = (action, callback) => {
    if (action == 'next') {
        LoginClass.check($('[data-inputs-input].active').find('[name]').attr('name'), () => {
            callback(!LoginClass.isErrors());

            if (LoginClass.isErrors()) {
                $('[data-inputs-input].active').find('[name]').trigger('focus');
            }
        });
    } else {
        callback(true);
    }
}