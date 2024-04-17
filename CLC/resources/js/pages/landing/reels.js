import Swiper from "swiper/bundle";
import options from "../../modules/swiperOptions";

import "../../modules/collapse";
import "../../block/opinions";
import "../../block/mentors.new";
import "../../block/professional";
import "../../../../../js-modules/jquery.maskedinput";
import OpinionModal from "../../class/OpinionModal";

$('[name="phone"]').mask("+7 (999) 999-99-99");

class ReelsVideo {
    constructor(element) {
        this.wrap = element;
        this.id = this.getId(this.wrap);
        this.seconds = parseFloat(this.wrap.attr('data-seconds'));

        this.events();
    }

    getId(elem) {
        return parseInt(elem.attr('data-id'));
    }

    events() {
        window.addEventListener("blur", () => {
            setTimeout(() => {
                const iframe = $(document.activeElement);
                const id = this.getId(iframe.parents('[data-id]'));

                if (id === this.id) {
                    this.play();
                }
            });
        });
    }

    isCompleted() {
        const startTime = parseFloat(localStorage.getItem('start_' + this.id));

        if (startTime) {
            const diffTime = +new Date() - startTime;

            return diffTime >= this.seconds * 1000;
        }

        return false;
    }

    unlocked() {
        this.wrap.removeClass('course-item-locked');
    }

    play() {
        console.log('play');
        if (!localStorage.getItem('start_' + this.id)) {
            localStorage.setItem('start_' + this.id, +new Date());
        }
    }
}

class Reels {
    constructor() {
        this.videos();
        this.events();
    }

    events() {
        $(document).on('mouseleave', '.course-item[data-seconds] iframe', () => {
            window.focus();
        })

        this.recModals();
        this.swiper();
    }

    videos() {
        let videos = [], allCompleted = true, nextUnlocked = false;

        $('.course-item[data-seconds]').each((i, elem) => {
            videos.push(new ReelsVideo($(elem)));
        });

        setInterval(() => {
            videos.forEach((item) => {
                if (nextUnlocked) {
                    item.unlocked();
                }

                if (item.isCompleted()) {
                    nextUnlocked = true;
                    allCompleted = true;
                } else {
                    nextUnlocked = false;
                    allCompleted = false;
                }
            })

            if (allCompleted) {
                $('.course-item-certificate').removeClass('course-item-locked');
            }
        }, 1000)
    }

    recModals() {
        const ReelsOpinionModal = new OpinionModal(
            '[data-modal-id="opinion-modal"]'
        );

        $(document).on("click", "[data-op-open]", (e) => {
            const parent = $(e.currentTarget).parent();
            const name = $.trim(parent.next().html());

            ReelsOpinionModal.show(name);
        });
    }

    swiper() {
        var swiperCourses = new Swiper(
            ".swiper-courses",
            $.extend(
                {
                    spaceBetween: 20,
                    breakpoints: {
                        0: {
                            slidesPerView: 1,
                        },
                        768: {
                            slidesPerView: "auto",
                        },
                    },
                    pagination: {
                        el: ".section-courses-inner .courses-pagination",
                        type: "bullets",
                    },
                    scrollbar: {
                        el: ".courses-scrollbar",
                        draggable: true,
                        dragSize: "auto",
                        hide: false,
                        snapOnRelease: true,
                    },
                    navigation: {
                        nextEl: ".courses-btn-next",
                        prevEl: ".courses-btn-prev",
                    },
                    allowTouchMove: true,
                    grabCursor: true,
                    grid: {
                        fill: "row",
                    },
                },
                options
            )
        );
        setTimeout(function () {
            swiperCourses.update();
        }, 500);
    }
}

new Reels();
