import Swiper from 'swiper/bundle';

class Playlist {
    constructor() {
        this.events();
        // this.scrollToElem();
        // this.modalShown();
        this.swipers();
    }

    events() {
        $(document)
            .on('click', '[data-locked]', () => {
                modalNotify.create({
                    title: 'Урок недоступен',
                    text: 'Пройдите тестирование, <br>чтобы открыть следующий урок'
                });
            })
            .on('click', '[data-test-locked]', () => {
                modalNotify.create({
                    title: 'Тест недоступен',
                    text: 'Пройдите предыдущие этапы, <br>чтобы открыть это тестирование'
                });
            });
    }

    scrollToElem() {
        let parent = $(".video-playlist-scroll"),
            elem = $(".video-playlist-item.active"),
            topElem = elem.position().top - parent.position().top;

        parent.animate({
            scrollTop: topElem,
        },
            800
        );
    }

    modalShown() {
        if ($(window).width() >= 768) {
            var scrollPos = 0,
                elem = $("[sticky]"),
                parent = $("[sticky]").parent();

            $(document).on("show.bs.modal", () => {
                var st = elem.scrollTop(parent) + 60;
                if (st > scrollPos) {
                    $("[sticky]").css("position", "absolute");
                    $("[sticky]").css("top", st);
                }
            });
            $(document).on("hide.bs.modal", () => {
                var st = 60;
                $("[sticky]").css("position", "sticky");
                $("[sticky]").css("top", st);
            });
        }
    }

    swipers() {
        new Swiper('.swiper-playlist', {
            slidesPerView: 'auto',
            spaceBetween: 10,
            direction: "horizontal",
            grid: {
                fill: "row",
                rows: 1,
            },
            freeMode: {
                enabled: true,
                sticky: true,
                momentum: true,
                momentumRatio: 0.5,
            },
            scrollbar: {
                el: ".swiper-scrollbar",
                draggable: true,
                dragSize: 'auto',
                hide: false,
                snapOnRelease: true,
            },
            mousewheel: {
                enabled: true,
                forceToAxis: true,
            },
            allowTouchMove: true,
            breakpoints: {
                768: {
                    direction: "vertical",
                    grid: {
                        fill: "column",
                        rows: 1,
                    },
                    allowTouchMove: true,
                },
                1200: {
                    direction: "vertical",
                    grid: {
                        fill: "column",
                        rows: 1,
                    },
                    freeMode: false,
                    cssMode: true,
                    allowTouchMove: false,
                }
            },
            on: {
                init: (swiper) => {
                    setTimeout(() => {
                        swiper.slideTo($('.video-playlist-item.active').parent().index());
                    }, 1000)
                },
            }
        });
    }
}

export default new Playlist();