import 'lazysizes';
import 'lazysizes/plugins/parent-fit/ls.parent-fit';
import './modules/jquery';
import '../../../js-modules/ajax';
import '../../../js-modules/validate';
import '../../../js-modules/scroller';
import '../../../js-modules/AjaxForm';

const inverted = () => {
    setTimeout(() => {
        $('.section-plug').addClass('switchToYellow');
        setTimeout(() => {
            $('.section-plug').removeClass('switchToYellow');
            $('.section-plug').addClass('switchToGreen');
        }, 10000);

        setTimeout(() => {
            $('.section-plug').removeClass('switchToGreen');
            $('.section-plug').addClass('switchToGrey');
        }, 20000);

        setTimeout(() => {
            $('.section-plug').removeClass('switchToGrey');
            inverted();
        }, 30000);
    }, 10000);

}

setTimeout(() => {
    $('.screensaver').addClass('screensaver-hide');
    inverted();
}, 2500);

