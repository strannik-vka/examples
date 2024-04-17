import Swiper from "swiper/bundle";
import options from '../modules/swiperOptions';
import clamp from "clamp-js";
import ElementIntersection from "../../../../js-modules/ElementIntersection";

class Opinions {
    constructor() {
        this.swiper();
        this.readMore();
        this.animateInit();
    }

    swiper() {
        var swiperOpinions = new Swiper(".swiper-opinions", $.extend({
            breakpoints: {
                320: {
                    slidesPerView: "auto",
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 600,
                },
                992: {
                    slidesPerView: 1,
                    spaceBetween: 1200,
                },
            },
            centeredSlides: true,
            pagination: {
                el: ".section-opinions-inner .opinions-pagination",
                type: "bullets",
            },
            navigation: {
                nextEl: '.opinions-btn-next',
                prevEl: '.opinions-btn-prev',
            },
            allowTouchMove: true,
            grabCursor: true,
            grid: {
                fill: "row",
            },
        }, options));
        setTimeout(function () {
            swiperOpinions.update();
        }, 500);
    }

    readMore() {
        let elements = document.querySelectorAll('.opinion-card-description');

        elements.forEach(element => {
            var id = element.closest('.opinion-card').getAttribute('data-opinion-card');
            var link = '... <a href="javascript://" class="link opacity-50 text-decoration-underline" style="text-decoration-skip-ink: none;"  data-op-open="">(Читать полностью)</a>';

            setTimeout(() => {
                clamp(element, { clamp: 8, useNativeClamp: false, truncationChar: ' ', truncationHTML: link, splitOnChars: ['.', '-', '–', '—', ' '], animate: false });
            }, 200);
        });
    }

    animateInit() {
        new ElementIntersection(".section-opinions-figure", () => {
            $('.section-opinions-figure').addClass('infiniteStepRotation');
        }, () => {
            $('.section-opinions-figure').removeClass('infiniteStepRotation');
        }, {
            rootMargin: '5% 0px 5% 0px',
        });
    }
}

new Opinions();