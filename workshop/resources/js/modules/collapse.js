var elem = $('[data-collapse-id]');

class CollapseCard {
    constructor() {
        this.events();
    }

    events() {
        $('[data-collapse-toggle]').on('click', (e) => {
            this.toggle(e);
        });
    }

    toggle(e) {
        if ($(e.currentTarget).parent().parent().hasClass('show')) {
            elem.each((i, item) => {
                $(item).removeClass('show');
            });
            $(e.currentTarget).parent().parent().removeClass('show');
        } else {
            elem.each((i, item) => {
                $(item).removeClass('show');
            })
            $(e.currentTarget).parent().parent().addClass('show');
        }
    }

}

new CollapseCard();