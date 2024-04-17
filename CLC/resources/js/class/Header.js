class Header {
    constructor() {
        this.events();
    }

    events() {
        $(window).on('scroll', () => {
            if ($(window).scrollTop() > 10 || $('body').hasClass('modal-open')) {
                this.stickyAdd();
            } else {
                this.stickyDel();
            }
        });

        if ($(window).scrollTop() > 10) {
            this.stickyAdd();
        }

        this.scrollPage();
    }

    stickyAdd() {
        $(".header").addClass('header-sticky');
    }

    stickyDel() {
        $(".header").removeClass('header-sticky');
    }

    scrollPage() {
        var scrollPos = 0;

        $(window).on("scroll", () => {
            var st = $(window).scrollTop();

            if (st > 100) {

                if (st > scrollPos) {
                    $(".header").addClass("header-sticky-up");
                } else {
                    $(".header").removeClass("header-sticky-up");
                }
            } else {
                $(".header").removeClass("header-sticky-up");
            }

            scrollPos = st;
        });
    }
}

export default new Header();