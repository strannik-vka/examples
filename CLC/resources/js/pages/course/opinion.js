// js-modules
import '../../../../../js-modules/file_change';
import '../../../../../js-modules/text_count';
import '../../../../../js-modules/textarea_autosize';
import '../../../../../js-modules/otherVariant';
import AjaxForm from '../../../../../js-modules/AjaxForm';
import Suggestions from '../../../../../js-modules/Suggestions';

// modules
import '../../modules/popover';
import '../../modules/formErrorsRemove';

import './playlist';
import { formPollRequired } from '../../modules/formPollRequired';
import certificateModal from './modal/certificateModal';

let MySuggestions = new Suggestions({ token: '6f4a551cf68b71b197aee0c2593cf6bc0e95b76b' });

MySuggestions.region($('[data-region]'));

// Режим чтения
const hasFormDisabled = () => {
    return $('#opinionForm').attr('readonly') == 'readonly';
}

const setFormDisabled = () => {
    $('#opinionForm').attr('readonly', 'readonly');
    $('#opinionForm [name]').attr('disabled', 'disabled');
    $('[data-is-answer-hide]').hide();
}

$(() => {
    if (hasFormDisabled()) {
        setFormDisabled();
    }
})

// Модалка успеха
new AjaxForm('#opinionForm', {
    beforeSubmit: (callback) => {
        callback(formPollRequired($('#opinionForm [data-field]')))
    },
    afterSubmit: (response) => {
        if (response.error) {
            alert(response.error);
        }
    }
})

$('#opinionForm')
    .on('ajax-response-success', () => {
        if (window?.AjaxFormData?.certificate) {
            certificateModal.setProps(window.AjaxFormData.certificate);
            certificateModal.show();
        }

        setFormDisabled();
        $(document).trigger('ajax.update');
    });

$(document).on('ajax.update.success', () => {
    setFormDisabled();
});

// Выбор индустрий
$(document)
    .on('change', '#myindustries [name]', () => {
        let names = [];

        $('#myindustries [name]:checked').each((i, item) => {
            names.push($.trim($(item).next().text()));
        });

        $('[data-popover-toggle="myindustries"] input').val(names.join(', ')).trigger('change');
    })

$('#myindustries [name]').trigger('change');