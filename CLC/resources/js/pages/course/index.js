import '../../modules/collapse';
import '../../block/opinions';
import '../../block/mentors.new';
import '../../block/professional';
import '../../../../../js-modules/jquery.maskedinput';
import OpinionModal from "../../class/OpinionModal";

$('[name="phone"]').mask('+7 (999) 999-99-99');

class Course {
    constructor() {
        this.events();
    }

    events() {
        this.recModals();
    }

    recModals() {
        const CourseOpinionModal = new OpinionModal('[data-modal-id="opinion-modal"]');


        $(document).on('click', '[data-op-open]', (e) => {
            const parent = $(e.currentTarget).parent();
            const name = $.trim(parent.next().html());

            CourseOpinionModal.show(name);
        });
    }

}

new Course();