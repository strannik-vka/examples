import Lottie from "lottie-web";

var elem = $('#rateFigure');

class RateSection {
    constructor() {
        this.events();

        this.animElem = {};
    }

    events() {
        this.animation();
    }

    animation() {
        this.animElem = Lottie.loadAnimation({
            container: document.getElementById('rateFigure'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '/assets/json/industries/6/data.json'
        });

        if (elem) {
            this.animElem.play();
        } else {
            this.animElem.stop();
        }
    }
}

new RateSection();