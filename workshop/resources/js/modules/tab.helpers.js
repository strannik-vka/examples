const tabHelpers = {

    show(tab) {
        tab.addClass('active');
    },

    close(tab) {
        tab.removeClass('active');
    },

    toggle(tab) {
        tab.toggleClass('active');
    }

}

export default tabHelpers;