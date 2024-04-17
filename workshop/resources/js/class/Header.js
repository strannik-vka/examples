class Header {
    constructor() {
        this.events();
    }

    events() {
        let pageHasCover = $(document).find('.section-cover');

        $(window).on('scroll', () => {
            if ($(window).scrollTop() > (pageHasCover.length ? pageHasCover.height() : 10) || $('body').hasClass('modal-open')) {
                this.addColor();
            } else {
                this.removeColor();
            }
        });

        if ($(window).scrollTop() > (pageHasCover.length ? pageHasCover.height() : 10)) {
            this.addColor();
        }

        this.scrollPage();
    }

    addColor() {
        $(".header").addClass('header-colorized');
    }

    removeColor() {
        $(".header").removeClass('header-colorized');
    }

    scrollPage() {
        var scrollPos = 0;

        $(window).on("scroll", () => {
            var st = $(window).scrollTop();

            if (st > 100) {
                $(".header").addClass("header-scroll-down header-compact");
                if (st > scrollPos) {
                    $(".header").addClass("header-scroll-down");
                } else {
                    $(".header").removeClass("header-scroll-down");
                }
            } else {
                $(".header").removeClass("header-scroll-down header-compact");
            }

            scrollPos = st;
        });
    }
}

export default new Header();