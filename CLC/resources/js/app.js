// wow extend
import WOW from 'wow.js';
new WOW().init();

import '@popperjs/core';

// lazyload
import 'lazysizes';
import 'lazysizes/plugins/parent-fit/ls.parent-fit';

// primary
import './modules/jquery';

// Для audio
import 'jquery-ui/ui/widgets/../version';
import 'jquery-ui/ui/widgets/../keycode';
import 'jquery-ui/ui/widgets/../widget';
import 'jquery-ui/ui/widgets/mouse';
import 'jquery-ui/ui/widgets/slider';

// js-modules
import '../../../js-modules/ajax';
import '../../../js-modules/Debug';
import '../../../js-modules/validate';
import '../../../js-modules/scroller';
import '../../../js-modules/AjaxForm';
import '../../../js-modules/items';
import '../../../js-modules/HrefOnclick';
import '../../../js-modules/autocompleteOff';
import '../../../js-modules/URLParam';

// project modules
import './modules/menu';
import './modules/modal';
import './modules/tab';
import './modules/notifyBar';
import './modules/csrf';

// class
import './class/Header';

// block
import './block/search';

// Клик на скачать сертификат
import certificateModal from './pages/course/modal/certificateModal';
certificateModal.downloadClickEvent();