import Swiper from "swiper/bundle";
import options from '../modules/swiperOptions';

const items = document.querySelectorAll('[data-mentor-id]');

const muteButtons = document.querySelectorAll('[data-mentor-mute]');

class Mentors {
    constructor() {
        this.swiper();
    }

    swiper() {
        var swiperMentors = new Swiper(".swiper-mentors", $.extend({
            slidesPerView: "auto",
            spaceBetween: 20,
            scrollbar: {
                el: ".mentor-scrollbar",
                draggable: true,
                dragSize: 'auto',
                hide: false,
                snapOnRelease: true,
            },
            navigation: {
                nextEl: '.mentor-btn-next',
                prevEl: '.mentor-btn-prev',
            },
            allowTouchMove: true,
            grabCursor: true,
        }, options));

        setTimeout(function () {
            swiperMentors.update();
        }, 500);
    }
}

new Mentors();