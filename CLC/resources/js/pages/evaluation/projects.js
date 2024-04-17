// modules
import '../../modules/popover';
import '../../modules/radio';

class EvaluationProjects {

    constructor() {
        this.sort_key = false;
        this.sort_val = false;
        this.items_name = 'project';

        $(document)
            .on('change', '[name="sort"]', (e) => {
                this.sortMobile($(e.currentTarget));
            })
            .on('mousedown', '[data-sort]', (e) => {
                this.sort($(e.currentTarget));
            })
            .on('click', '[data-project-url] *', (e) => {
                var elem = $(e.currentTarget).closest('[data-project-url]'),
                    url = elem.attr('data-project-url');

                if (url) {
                    location.href = url;
                }
            });

        this.items();
    }

    sortMobile(input) {
        var val = input.val().split(':');
        this.sort_key = val[0];
        this.sort_val = val[1];

        if (this.sort_key == 'id') {
            items.model[this.items_name].loop_iteration_reverse = this.sort_val == 'asc' ? false : true;
        }

        items.update(this.items_name);
    }

    sort(elem) {
        this.sort_key = elem.attr('data-sort');
        this.sort_val = this.sort_val == 'desc' ? 'asc' : 'desc';

        if (this.sort_key == 'id') {
            items.model[this.items_name].loop_iteration_reverse = this.sort_val == 'asc' ? false : true;
        }

        items.update(this.items_name);
    }

    filter() {
        var data = {};

        if (this.sort_key) {
            data.sort_key = this.sort_key;
            data.sort_val = this.sort_val;
        }

        return data;
    }

    items() {
        items.create({
            name: this.items_name,
            data: () => {
                return this.filter();
            },
            scroll_window: true,
            first_load: true,
        });
    }

}

new EvaluationProjects();