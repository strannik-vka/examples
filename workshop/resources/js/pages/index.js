import Swiper from "swiper/bundle";
import "../block/siteItem";
import "../block/rate";

$(() => {
    const urlModal = URLParam('modal');

    if (urlModal == 'success') {
        $('[data-modal-id="success"] [data-tg-url]')[0].click();
    }
})

if ($(".swiper-about").length) {
    var swiperAbout = new Swiper(".swiper-about", {
        slidesPerView: "auto",
        spaceBetween: 20,
        navigation: {
            enabled: false,
        },
        allowTouchMove: true,
        grabCursor: true,
    });
    setTimeout(function () {
        if (swiperAbout.update) {
            swiperAbout.update();
        }
    }, 500);
}

if ($(".swiper-program").length) {
    var swiperProgram = new Swiper(".swiper-program", {
        slidesPerView: "auto",
        spaceBetween: 25,
        navigation: {
            enabled: false,
        },
        allowTouchMove: true,
        grabCursor: true,
    });
    setTimeout(function () {
        if (swiperProgram.update) {
            swiperProgram.update();
        }
    }, 500);
}
