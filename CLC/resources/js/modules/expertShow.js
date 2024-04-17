import '../../../../js-modules/URLParam';

let expertId = URLParam('expert-show');

if (expertId) {
    scroller.to($('#experts'), () => {
        $('[data-expert-id="' + expertId + '"]').click();
    }, 400);
}