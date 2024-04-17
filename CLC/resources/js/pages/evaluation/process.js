import modalHelpers from "../../modules/modal.helpers";
import notify from "../../modules/notify";

class EvaluationProcess {

    constructor() {
        this.isFosus = false;
        this.isAjax = false;

        $(document)
            .on('submit', '#score_form', (e) => {
                e.preventDefault();
                this.submit($(e.currentTarget));
            })
            .on('blur', '#score_form [name^="criterions"]', (e) => {
                this.blur($(e.currentTarget));
            })
            .on('focus', '#score_form [name^="criterions"]', (e) => {
                this.focus($(e.currentTarget));
            })
            .on('input', '#score_form [name^="criterions"]', (e) => {
                this.input($(e.currentTarget));
            })
            .on('click', '#score_form [data-score-plus]', (e) => {
                this.plus($(e.currentTarget));
            })
            .on('click', '#score_form [data-score-minus]', (e) => {
                this.minus($(e.currentTarget));
            });

        this.change($('#score_form [data-score-minus]:eq(0)'));
    }

    submit(form) {
        var total = parseInt($('[data-score-total]').html());

        if (total == 0) {
            notify({
                title: 'Пожалуйста, поставьте оценку выше нуля'
            });
            return false;
        }

        if (this.isAjax) {
            return false;
        }
        this.isAjax = true;

        ajax({
            url: form.attr('action'),
            type: 'post',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: new FormData(form[0]),
            queue: true
        }, (json) => {
            this.isAjax = false;

            var error = false;

            if (typeof json === 'object' && json != null) {
                if (json.success) {
                    if (json.type == 2) {
                        modalHelpers.show($('[data-modal-id="editModal"]'));
                    } else {
                        modalHelpers.show($('[data-modal-id="successModal"]'));
                    }

                    form.find('[type="submit"]').html('Вы уже оценили эту заявку').attr('disabled', 'disabled');

                    return false;
                } else if (json.error) {
                    error = json.error;
                } else if (json.errors) {
                    return false;
                }
            }

            notify({
                title: error ? error : 'Что-то пошло не так :(<br>попробуйте позже'
            });

            if (error == false) {
                debug.send('isObject, no key: ' + JSON.stringify(json));
            }
        }, form);
    }

    isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

    getValue(input, type) {
        var val = parseFloat(input.val());

        val = this.isNumber(val) ? val : 0;

        if (type == 'plus') {
            val++;
        }

        if (type == 'minus') {
            val--;
        }

        val = val > 10 ? 10 : val;
        val = val < 0 ? 0 : val;

        return val;
    }

    plus(btn) {
        var group = btn.parents('[data-score-group]'),
            input = group.find('[name]'),
            val = this.getValue(input, 'plus');

        input.val(val + '/10');

        this.change(input);
    }

    minus(btn) {
        var group = btn.parents('[data-score-group]'),
            input = group.find('[name]'),
            val = this.getValue(input, 'minus');

        input.val(val + '/10');

        this.change(input);
    }

    focus(input) {
        this.isFosus = true;
        input.val(this.getValue(input));
    }

    blur(input) {
        this.isFosus = false;
        input.val(this.getValue(input) + '/10');
    }

    input(input) {
        var val = parseFloat(input.val());

        input.val(val);

        if (this.isNumber(val)) {
            if (val > 10) {
                input.val(10);
            }

            if (val < 0) {
                input.val(0);
            }
        } else if ($.trim(input.val()) != '') {
            input.val('');
        }

        this.change(input);
    }

    change(elem) {
        var form = elem.parents('#score_form'),
            sum = 0;

        form.find('[name^="criterions"]').each((i, item) => {
            var getValue = this.getValue($(item));

            if (getValue) {
                $(item).removeClass('opacity-30');
            } else {
                $(item).addClass('opacity-30');
            }

            sum += getValue;
        });

        $('[data-score-total]').html(sum);

        if (sum) {
            $('[data-score-total]').removeClass('opacity-30');
        } else {
            $('[data-score-total]').addClass('opacity-30');
        }
    }

}

new EvaluationProcess();