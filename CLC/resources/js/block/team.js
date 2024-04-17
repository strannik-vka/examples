import Swiper from "swiper/bundle";
import options from '../modules/swiperOptions';

class Team {
    constructor() {
        this.swiper();
    }

    swiper() {
        var swiperTeam = new Swiper(".swiper-team", $.extend({
            breakpoints: {
                320: {
                    slidesPerView: "auto",
                    spaceBetween: 20,
                },
            },
            grabCursor: true,
        }, options));
        setTimeout(function () {
            swiperTeam.update();
        }, 500);
    }
}

new Team();