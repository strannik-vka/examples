import '../../../../../js-modules/InputsNavigate';

class Register {

    constructor() {
        this.errors = {};
        this.validateTimeOut = false;

        this.form = $('[data-ajax-form="register"]');

        this.form
            .on('input change', '[name]', (e) => {
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
            name = $(e.currentTarget).attr('name'),
            result = {};

        if (rules[name]) {
            result[name] = rules[name];
        }

        return result;
    }

    isErrors() {
        return Object.keys(this.errors).length;
    }

    check(e) {
        if (this.validateTimeOut) clearTimeout(this.validateTimeOut);

        this.validateTimeOut = setTimeout(() => {
            this.errors = validate.check(this.form, this.currentRule(e), true);
        }, 100);
    }

}

new Register();