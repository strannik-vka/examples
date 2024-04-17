class Menu {
    constructor() {
        this.events();
    }

    events() {
        $(document)
            .on("click", "[data-menu-open]", () => {
                this.menuOpen();
            })
            .on("click", "[data-menu-close]", () => {
                this.menuClose();
            });
    }

    menuOpen() {
        $(".menu-mobile").addClass("menu-mobile-show");
        $("body").addClass("menu-mobile-open");
    }

    menuClose() {
        $(".menu-mobile").removeClass("menu-mobile-show");
        $("body").removeClass("menu-mobile-open");
    }
}

export default new Menu();
