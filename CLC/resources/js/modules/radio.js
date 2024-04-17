class Radio {
    constructor() {
        $(document)
            .on('click', (e) => {
                if ($(e.target).closest('[data-radio-new]').length == 0 && $('[data-radio-new]').hasClass('active')) {
                    this.close();
                } else if ($(e.target).attr('data-radio-title') !== undefined) {
                    this.open($(e.target));
                }
            })
            .on('change', '[data-radio-new] [name]', (e) => {
                this.change($(e.currentTarget));
            });

        setTimeout(() => {
            $('input[type="radio"]').each(function () {
                if (!$(this).attr('checked') && $(this).prop('checked')) {
                    location.reload();
                    return false;
                }
            });
        }, 100);
    }

    open(title) {
        title.parent().toggleClass('active');
    }

    close() {
        $('[data-radio-new]').removeClass('active');
    }

    change(input) {
        var parent = input.parents('[data-radio-new]'),
            isChecked = parent.find('[data-radio-selected] [name]:checked').length;

        var label = input.next('label'),
            group = input.parents('[data-radio-group]'),
            parent = input.parents('[data-radio-new]');

        let text = isChecked
            ? group.find('[data-radio-group-title]').text() + ': ' + label.text()
            : parent.find('[data-radio-title]').attr('data-radio-title');

        parent.find('[data-radio-title]').html(text);

        this.close();
    }
}

new Radio();