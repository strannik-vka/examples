var isCollapseShow = false;

const collapseHelpers = {

    show(collapse) {
        collapse.addClass('show');
    },

    close(collapse) {
        collapse.removeClass('show');
    },

    toggle(collapse) {
        collapse.removeClass('show');
        if (isCollapseShow) {
            isCollapseShow = false;
            if (collapse.is('.show')) {
                collapse.removeClass('show');
            } else {
                collapse.addClass('show');
            }
        } else {
            isCollapseShow = true;
            collapse.toggleClass('show');
        }
    }

}

export default collapseHelpers;