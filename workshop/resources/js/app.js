// wow extend
import WOW from "wow.js";
new WOW().init();

// lazyload
import "lazysizes";
import "lazysizes/plugins/parent-fit/ls.parent-fit";

// jquery
import "./modules/jquery";
import "jquery-ui/dist/jquery-ui";
import "jquery-ui-touch-punch";

// js-modules
import "../../../js-modules/ajax";
import "../../../js-modules/Debug";
import "../../../js-modules/scroller";
import "../../../js-modules/validate";
import "../../../js-modules/AjaxForm";
import "../../../js-modules/jquery.maskedinput";
import "../../../js-modules/FormStorage";
import "../../../js-modules/textarea_autosize";
import "../../../js-modules/URLParam";
import '../../../js-modules/jquery.maskedinput';

$('[name="phone"]').mask('+7 (999) 999-99-99');

// primary
import "./modules/isSafari";
import "./modules/menu";
import "./modules/modal";
import "./modules/collapse";

// block
import "./block/swiper";
import "./block/validate.form";

// class
import "./class/Header";