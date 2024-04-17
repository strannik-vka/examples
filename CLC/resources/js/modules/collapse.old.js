import collapseHelpers from "./collapse.helpers";

class CollapseCard {
    constructor() {
        this.events();
    }

    events() {

        $('[data-collapse-open]').on('click', (e) => {
            this.open(e);
        });

        $('[data-collapse-close]').on('click', (e) => {
            this.close(e);
        });

        $('[data-collapse-toggle]').on('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            this.toggle(e);
        });
    }

    open(e) {
        $(e.currentTarget).parents().find('.collapse-card').removeClass('show');
        let collapseName = $(e.currentTarget).attr('data-collapse-open');

        collapseHelpers.show($('[data-collapse-id="' + collapseName + '"]'));
    }

    close(e) {
        $(e.currentTarget).parents().find('.collapse-card').removeClass('show');
        let collapseName = $(e.currentTarget).attr('data-collapse-close');

        collapseHelpers.close($('[data-collapse-id="' + collapseName + '"]'));
    }

    toggle(e) {
        $(e.currentTarget).parents().find('.collapse-card').removeClass('show');
        let collapseName = $(e.currentTarget).attr('data-collapse-toggle');

        collapseHelpers.toggle($('[data-collapse-id="' + collapseName + '"]'));

    }

}

new CollapseCard();