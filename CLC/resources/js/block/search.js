const getQuery = () => {
    let val = $('[name="search"]').val();

    return $.trim(val);
}

const getCategories = () => {
    let list = [];

    $('[name="categories[]"]:checked').each((i, item) => {
        list.push($(item).val());
    });

    return list;
}

const getFilderData = () => {
    var data = {};

    if (getQuery()) {
        data.query = getQuery();
    }

    if (getCategories().length > 0) {
        data.categories = getCategories();
    }

    return data;
}

items.create({
    name: 'search',
    data: getFilderData,
    onPrint: response => {
        if (response.data && response.data.length == 0) {
            $('[items-empty-search] [html="query"]').html(getQuery());
        }
    }
})

let setTimeoutSearch = null;

$(document).on('input', '[data-search-form] [name]', () => {
    if (setTimeoutSearch) {
        clearTimeout(setTimeoutSearch);
    }

    if (getQuery()) {
        $('[data-search-start]').hide();

        setTimeoutSearch = setTimeout(() => {
            items.update('search');
        }, 1000);
    } else {
        $('[data-search-start]').show();
        $('[items-preloader-search], [items-empty-search], [items-list-search]').hide();
    }
})