import Swiper from "swiper/bundle";

if ($(".swiper-demo1").length) {
    var swiperDemo1 = new Swiper(".swiper-demo1", {
        slidesPerView: "auto",
        spaceBetween: 20,
        scrollbar: {
            el: ".swiper-scrollbar-demo1",
            draggable: true,
            dragSize: "auto",
            hide: false,
            snapOnRelease: true,
        },
        navigation: {
            enabled: false,
        },
        allowTouchMove: true,
        grabCursor: true,
    });
    setTimeout(function () {
        if (swiperDemo1.update) {
            swiperDemo1.update();
        }
    }, 500);
}