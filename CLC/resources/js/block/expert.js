import Swiper from "swiper/bundle";
import options from '../modules/swiperOptions';
import SwiperAPI from '../../../../js-modules/SwiperAPI';
import '../modules/expertShow';

if ($('.section-expert-inner').length) {
    let swiperExpert = new Swiper('.swiper-expert', $.extend({
        pagination: {
            el: ".section-expert-inner .expert-pagination",
            type: "fraction",
        },
        navigation: {
            nextEl: '.expert-btn-next',
            prevEl: '.expert-btn-prev',
        },
        slidesPerView: 1,
        breakpoints: {
            320: {
                spaceBetween: 20,
            },
            768: {
                spaceBetween: 160,
            }
        },
        effect: "fade",
        fadeEffect: {
            crossFade: true
        },
        grabCursor: true,
    }, options));

    let swiperTeacher = new Swiper('.swiper-teacher', {
        slidesPerView: 'auto',
        breakpoints: {
            320: {
                spaceBetween: 10,
            },
            768: {
                spaceBetween: 20,
            },
            1200: {
                spaceBetween: 20,
            }
        },
        grid: {
            fill: "row",
        },
    });

    setTimeout(() => {
        swiperExpert.update();
        swiperTeacher.update();

        $('[data-expert-id]:eq(0)').click();
    }, 400);

    const TeacherSwiperAPI = new SwiperAPI('.swiper-expert');
    TeacherSwiperAPI.sync('.swiper-teacher');
}