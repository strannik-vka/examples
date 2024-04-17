class Menu {
    constructor() {
        this.events();
    }

    events() {
        $(document)
            .on('click', '[menu-open]', () => {
                this.menuOpen();
            })
            .on('click', '[menu-close]', () => {
                this.menuClose();
            });
    }

    menuOpen() {
        $('.mobile-menu').addClass('mobile-menu-show');
        $('body').addClass('mobile-menu-open');
    }

    menuClose() {
        $('.mobile-menu').removeClass('mobile-menu-show');
        $('body').removeClass('mobile-menu-open');
    }
}

export default new Menu();