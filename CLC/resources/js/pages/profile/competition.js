// js-modules
import '../../../../../js-modules/file_change';
import '../../../../../js-modules/text_count';
import Suggestions from '../../../../../js-modules/Suggestions';
import modalHelpers from '../../modules/modal.helpers';
import '../../../../../js-modules/jquery.maskedinput';

// block
import '../../block/timer';

// modules
import '../../modules/popover';

// page scripts
let MySuggestions = new Suggestions({ token: '6f4a551cf68b71b197aee0c2593cf6bc0e95b76b' });

MySuggestions.region($('[name="region"]'));
MySuggestions.city($('[name="city"]'));

$('[name="phone"]').mask('+7 (999) 999-99-99');
$('[name="birthday"]').mask('99.99.9999');

$(document)
    .on('ajax-response-success', '[data-ajax-form="leaders-competition"]', () => {
        if (window.application.id) {
            modalHelpers.show($('#leaders-competition-update-modal'));
        } else {
            modalHelpers.show($('#leaders-competition-store-modal'));

            $(document).trigger('ajax.update');
        }

        window.application = window.AjaxFormData.application;
    })
    .on('change', '[name="activity_spheres[]"]', () => {
        let names = [];

        $('[name="activity_spheres[]"]:checked').each((i, item) => {
            names.push($.trim($(item).next().text()));
        });

        $('[data-valid-input="activity_spheres[]"]').val(names.join(', ')).trigger('change');
    })

$('[name="activity_spheres[]"]').trigger('change');