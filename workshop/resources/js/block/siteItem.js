import Lottie from "lottie-web";

var elem = $(".site-item");
var figure = $('[id^="animIndustry_"]');

class siteItem {
    constructor() {
        this.industryJson = {};

        this.events();
    }

    events() {
        if (window.innerWidth > 991) {
            elem.on("mouseenter touchstart", (e) => {
                this.active(e);
            });
        } else {
            elem.each((i, item) => {
                $(item).addClass('active');
                this.active(item)
            })
        }
    }

    run(figure) {
        var id = figure.attr('id'),
            num = id.split('_'),
            num = num[1];

        if (typeof this.industryJson[id] !== 'undefined') {
            this.industryJson[id].play();
        } else {
            this.industryJson[id] = Lottie.loadAnimation({
                container: document.getElementById(id),
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: '/assets/json/industries/' + num + '/data.json'
            });
        }

        if (!figure.parent().parent().hasClass('active')) {
            this.stop(figure);
        }
    }

    stop(figure) {
        var id = figure.attr('id');

        if (typeof this.industryJson[id] !== 'undefined') {
            this.industryJson[id].stop();
        }
    }

    active(e) {
        // Добавляем класс active
        $(e.currentTarget).addClass("active");

        figure.each((i, item) => {
            var figure = $(item);
            this.run(figure);
        });

        // Когда уводим курсор
        $(e.currentTarget).on("mouseleave touchend", (e) => {
            this.deactive(e);
        });
    }

    deactive(e) {
        // Удаляем класс active
        $(e.currentTarget).removeClass("active");
    }
}

new siteItem();
