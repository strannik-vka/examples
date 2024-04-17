// Заполнение полоски
const fillProgress = (progressMap) => {
    if ($('[data-percent-wrap]').length) {
        let percent = Math.round(100 / (progressMap.lessonsCount / progressMap.lessonsViewCount)),
            progress = percent == 100 ? parseFloat($('[data-progress-desktop]').css('width')) : $('.progress-desktop-point.active:eq(-1)')[0].offsetLeft;

        $('[data-percent-wrap]').removeClass('done').removeClass('half');
        $('[data-percent-wrap]').removeClass('done').removeClass('half');
        $('[data-percent-wrap]').addClass(percent == 100 ? 'done' : (percent >= 50 ? 'half' : ''));
        $('[data-percent-wrap]').addClass(percent == 100 ? 'done' : (percent >= 50 ? 'half' : ''));
        $('[data-progress-width]').css('width', progress + 'px');
        $('[data-percent]').html(percent + '%');

        const mobileProgressWrapWidth = parseFloat($('[data-progress-mobile]').css('width'));
        const mobileProgressLineWidth = (mobileProgressWrapWidth / progressMap.lessonsCount)
            * progressMap.lessonsViewCount;

        $('[data-progress-mobile] [data-progress-width]').css('width', mobileProgressLineWidth + 'px');
    }
}

$(() => {
    fillProgress(window.globalVar.progressMap);

    $(window).on('resize', () => {
        fillProgress(window.globalVar.progressMap);
    });
})

export default fillProgress;