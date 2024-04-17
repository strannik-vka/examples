import ZoneObject from "../../../../js-modules/ZoneObject";

let elements = ['.section-creative-background', '.section-creative-rotation'];

ZoneObject.create(".section-creative", {
    run: () => {
        $.each(elements, (index, element) => {
            $(element).addClass('active');
        });
    },
    stop: () => {
        $.each(elements, (index, element) => {
            $(element).removeClass('active');
        });
    }
});