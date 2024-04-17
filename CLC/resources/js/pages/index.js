import '../block/professional';
import '../block/recommendations';
import '../../../../js-modules/jquery.maskedinput';
import RecommendationModal from "../class/RecommendationModal";

class Main {
    constructor() {
        $('[name="phone"]').mask('+7 (999) 999-99-99');

        items.create({
            name: 'post',
            first_load: true,
        });

        this.events();
    }

    events() {
        const AboutRecommendationModal = new RecommendationModal('[data-modal-id="recommendation-modal"]');

        $(document).on('click', '[data-rec-open]', (e) => {
            const parent = $(e.currentTarget).parent();
            const name = $.trim(parent.find('.film-item-title, .book-item-title').html());
            const image = parent.find('img').length ? parent.find('img').attr('src') : null;

            AboutRecommendationModal.renderImage(image);
            AboutRecommendationModal.show(name);
        });
    }
}

new Main();