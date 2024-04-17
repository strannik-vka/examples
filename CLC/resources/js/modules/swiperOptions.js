var paddingTimer = false;

var paddingSwiper = () => {
    $('.swiper-wrapper').parents('.swiper-container').css('padding-left', $('.container').offset().left + 12);
    $('.swiper-wrapper').parents('.swiper-container').css('padding-right', $('.container').offset().left + 12);

    if (paddingTimer) {
        clearTimeout(paddingTimer)
    }

    paddingTimer = setTimeout(() => {
        window.dispatchEvent(new Event('resize'));
    }, 500);
}

export default {
    speed: 500,
    on: {
        beforeInit: paddingSwiper,
        resize: paddingSwiper,
        resizeObserver: false,
    }
}