import Swiper from "swiper/bundle";
import SwiperAPI from '../../../../js-modules/SwiperAPI';

class Education {
    constructor() {
        this.swiper();
    }

    swiper() {
        new Swiper('.swiper-tabs', {
            slidesPerView: 'auto'
        });

        new Swiper(".swiper-education", {
            slidesPerView: 1,
            centeredSlides: false,
            pagination: {
                el: ".swiper-education .swiper-pagination",
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            allowTouchMove: true,
            grabCursor: true,
            grid: {
                fill: "row",
            },
        });

        const DoingSwiperAPI = new SwiperAPI('.swiper-education');
        DoingSwiperAPI.sync('.swiper-tabs');
    }
}

new Education();