items.create({
    name: 'post',
    first_load: true,
    html: function (html, data, i) {
        if (i == 0) {
            html.find('[attr="src:thumb"]').attr('src', data.thumbLarge);
        }

        return html;
    }
});