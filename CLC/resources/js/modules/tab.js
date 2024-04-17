import tabHelpers from "./tab.helpers";

class Tab {
    constructor() {
        this.events();
    }

    events() {

        $('[data-tab-open]').on('click', (e) => {
            this.open(e);
        });

        $('[data-tab-close]').on('click', (e) => {
            this.close(e);
        });

        $('[data-tab-toggle]').on('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            this.toggle(e);
        });
    }

    open(e) {
        $(e.currentTarget).parents().find('.tab-pane').removeClass('active');
        $(e.currentTarget).addClass('active');
        let tabName = $(e.currentTarget).attr('data-tab-open');

        tabHelpers.show($('[data-tab-id="' + tabName + '"]'));
    }

    close(e) {
        $(e.currentTarget).parents().find('.tab-pane').removeClass('active');
        $(e.currentTarget).removeClass('active');
        let tabName = $(e.currentTarget).attr('data-tab-close');

        tabHelpers.close($('[data-tab-id="' + tabName + '"]'));
    }

    toggle(e) {
        $(e.currentTarget).parents().find('.tab-pane').removeClass('active');
        $(e.currentTarget).parents().find('[data-tab-toggle]').removeClass('active');
        $(e.currentTarget).addClass('active');
        let tabName = $(e.currentTarget).attr('data-tab-toggle');

        tabHelpers.toggle($('[data-tab-id="' + tabName + '"]'));

    }

}

new Tab();