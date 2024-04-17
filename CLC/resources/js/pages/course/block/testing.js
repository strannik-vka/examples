const testing = {
    reset: () => {
        window.isFormRest = true;

        $('#test [delete]').click();
        $('#test [name][type="text"], #test textarea[name]').val('');
        $('#test [name][type="radio"], #test [name][type="checkbox"]')
            .prop('checked', false).trigger('change');
        $('#test [type="submit"]').text('Отправить');
    }
}

export default testing