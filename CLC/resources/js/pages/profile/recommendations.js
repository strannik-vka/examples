// modules
import '../../modules/popover';

// block
import '../../block/recommendations';

// class
import RecommendationModal from "../../class/RecommendationModal";

class ProfileRecommendations {
    constructor() {
        this.recModals();
    }

    recModals() {
        const AboutRecommendationModal = new RecommendationModal('[data-modal-id="recommendation-modal"]');

        $(document).on('click', '[data-rec-open]', (e) => {
            const parent = $(e.currentTarget).parent();
            const name = $.trim(parent.find('.film-item-title, .book-item-title').html());
            const image = parent.find('img').length ? parent.find('img').attr('src') : null;

            AboutRecommendationModal.renderImage(image);
            AboutRecommendationModal.show(name);
        })
    }

}

new ProfileRecommendations();