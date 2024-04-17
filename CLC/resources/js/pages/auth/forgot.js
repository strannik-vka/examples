$('[name="email"]').on('input', (e) => {
    $('[data-forgot-email]').html($(e.currentTarget).val());
});