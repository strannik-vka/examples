import Distance from "../../../../js-modules/Distance";
import ElementIntersection from "../../../../js-modules/ElementIntersection";

import '../modules/popover';

// import '../block/team';
import '../modules/collapse';
import '../block/opinions';
import '../block/recommendations';
import OpinionModal from "../class/OpinionModal";
import RecommendationModal from "../class/RecommendationModal";

class About {
    constructor() {
        this.subjects();
        this.recModals();
    }

    recModals() {
        const AboutRecommendationModal = new RecommendationModal('[data-modal-id="recommendation-modal"]');
        const AboutOpinionModal = new OpinionModal('[data-modal-id="opinion-modal"]');

        $(document).on('click', '[data-rec-open]', (e) => {
            const parent = $(e.currentTarget).parent();
            const name = $.trim(parent.find('.film-item-title, .book-item-title').html());
            const image = parent.find('img').length ? parent.find('img').attr('src') : null;

            AboutRecommendationModal.renderImage(image);
            AboutRecommendationModal.show(name);
        });

        $(document).on('click', '[data-op-open]', (e) => {
            const parent = $(e.currentTarget).parent();
            const name = $.trim(parent.next().html());

            AboutOpinionModal.show(name);
        });
    }

    subjects() {
        let SubjectsDistance = null;

        new ElementIntersection(".section-subject", () => {
            var translateX1 = 0,
                translateX2 = 0;

            SubjectsDistance = new Distance(".subject-block");

            SubjectsDistance.listen((distance) => {
                if (
                    (distance.topPercent < 95 && distance.topPercent > 5) ||
                    (distance.bottomPercent < 95 &&
                        distance.bottomPercent > 5)
                ) {
                    translateX1 = distance.topPercent;
                    translateX2 = -distance.topPercent;

                    $(".subject-block-stage").each((i, item) => {
                        if (i % 2) {
                            $(item).css(
                                "transform",
                                "translateX(" + translateX1 + "px)"
                            );
                        } else {
                            $(item).css(
                                "transform",
                                "translateX(" + translateX2 + "px)"
                            );
                        }
                    });
                }
            });
        }, () => {
            if (SubjectsDistance !== null) {
                SubjectsDistance.destroy();
            }
        });
    }

}

new About();
