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
        if ($(e.currentTarget).hasClass('show')) {
            $(e.currentTarget).removeClass('show');
        } else {
            $('[data-collapse-id]').each((i, item) => {
                $(item).removeClass('show');
            })
            $(e.currentTarget).addClass('show');
        }
    }

}

new CollapseCard();