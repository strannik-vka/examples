import Swiper from "swiper/bundle";
import options from '../modules/swiperOptions';

class Winners {
    constructor() {
        this.swiper();
    }

    swiper() {
        var swiperWinners = new Swiper(".swiper-winner", $.extend({
            breakpoints: {
                320: {
                    slidesPerView: "auto",
                    spaceBetween: 20,
                },
            },
            scrollbar: {
                el: ".winner-scrollbar",
                draggable: true,
                dragSize: 'auto',
                hide: false,
                snapOnRelease: true,
            },
            navigation: {
                nextEl: '.winner-btn-next',
                prevEl: '.winner-btn-prev',
            },
            allowTouchMove: true,
            grabCursor: true,
        }, options));
        setTimeout(function () {
            swiperWinners.update();
        }, 500);
    }
}

new Winners();