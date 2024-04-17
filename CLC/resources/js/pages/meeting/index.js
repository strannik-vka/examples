items.create({
    name: 'meeting',
    first_load: true,
    modal: {
        name: 'meeting',
        data: function (id, callback) {
            $.get('/meeting/' + id, callback);
        }
    }
});