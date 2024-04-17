import '../../../../js-modules/URLParam';

let professionalId = URLParam('professional-show');

if (professionalId) {
    scroller.to($('#professionals'), () => {
        $('[data-professional-id="' + professionalId + '"]').click();
    }, 400);
}