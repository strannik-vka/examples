import Swiper from "swiper/bundle";
import options from '../modules/swiperOptions';
import popovers from '../modules/popover';

const navButtons = document.querySelectorAll('.tab-button');

class Recommendations {

    constructor() {
        this.swiper();

        window.addEventListener('change', (e) => {
            this.filter(e);
        });

        for (const navButton of navButtons) {
            if (('ontouchstart' in window) ||
                (navigator.maxTouchPoints > 0) ||
                (navigator.msMaxTouchPoints > 0)) {
                navButton.addEventListener('touchstart', (e) => {
                    this.checkNav(e);
                });
            } else {
                navButton.addEventListener('click', (e) => {
                    this.checkNav(e);
                });
            }
        }

    }

    swiper() {
        this.swiperArticles = new Swiper(".swiper-articles", $.extend({
            slidesPerView: "auto",
            spaceBetween: 20,
            scrollbar: {
                el: ".articles-scrollbar",
                draggable: true,
                dragSize: 'auto',
                hide: false,
                snapOnRelease: true,
            },
            navigation: {
                nextEl: '.articles-btn-next',
                prevEl: '.articles-btn-prev',
            },
            allowTouchMove: true,
            grabCursor: true,
            on: {
                init: (swiper) => {
                    swiper.slideTo(0);
                },
            }
        }, options));

        setTimeout(() => {
            this.swiperArticles.update();
        }, 500);

        this.swiperBooks = new Swiper(".swiper-books", $.extend({
            slidesPerView: "auto",
            spaceBetween: 20,
            scrollbar: {
                el: ".books-scrollbar",
                draggable: true,
                dragSize: 'auto',
                hide: false,
                snapOnRelease: true,
            },
            navigation: {
                nextEl: '.books-btn-next',
                prevEl: '.books-btn-prev',
            },
            allowTouchMove: true,
            grabCursor: true,
            on: {
                init: (swiper) => {
                    swiper.slideTo(0);
                },
            }
        }, options));

        setTimeout(() => {
            this.swiperBooks.update();
        }, 500);

        this.swiperPodcasts = new Swiper(".swiper-podcasts", $.extend({
            slidesPerView: "auto",
            spaceBetween: 20,
            scrollbar: {
                el: ".podcasts-scrollbar",
                draggable: true,
                dragSize: 'auto',
                hide: false,
                snapOnRelease: true,
            },
            navigation: {
                nextEl: '.podcasts-btn-next',
                prevEl: '.podcasts-btn-prev',
            },
            allowTouchMove: true,
            grabCursor: true,
            on: {
                init: (swiper) => {
                    swiper.slideTo(0);
                },
            }
        }, options));

        setTimeout(() => {
            this.swiperPodcasts.update();
        }, 500);

        this.swiperFilms = new Swiper(".swiper-films", $.extend({
            slidesPerView: "auto",
            spaceBetween: 20,
            scrollbar: {
                el: ".films-scrollbar",
                draggable: true,
                dragSize: 'auto',
                hide: false,
                snapOnRelease: true,
            },
            navigation: {
                nextEl: '.films-btn-next',
                prevEl: '.films-btn-prev',
            },
            allowTouchMove: true,
            grabCursor: true,
            on: {
                init: (swiper) => {
                    swiper.slideTo(0);
                },
            }
        }, options));

        setTimeout(() => {
            this.swiperFilms.update();
        }, 500);

        this.swiperInspiration = new Swiper(".swiper-inspirations", $.extend({
            slidesPerView: "auto",
            spaceBetween: 20,
            scrollbar: {
                el: ".inspirations-scrollbar",
                draggable: true,
                dragSize: 'auto',
                hide: false,
                snapOnRelease: true,
            },
            navigation: {
                nextEl: '.inspirations-btn-next',
                prevEl: '.inspirations-btn-prev',
            },
            allowTouchMove: true,
            grabCursor: true,
            on: {
                init: (swiper) => {
                    swiper.slideTo(0);
                },
            }
        }, options));

        setTimeout(() => {
            this.swiperInspiration.update();
        }, 500);
    }

    filter(e) {
        let lists = document.querySelectorAll('.popover-recommendations[show-popper]');

        for (const list of lists) {
            let hiddenLists = document.querySelectorAll('.popover-recommendations'),
                radios = list.querySelectorAll('input[type="radio"]'),
                selected = Array.prototype.slice.call(radios).filter(radio => radio.checked == true),
                itemsList = list.getAttribute('id'),
                navigations = document.querySelectorAll('.tab-button'),
                tabs = document.querySelectorAll('.tab-pane'),
                buttons = document.querySelectorAll('[data-popover-toggle="' + itemsList + '"]');

            tabs.forEach(tab => {
                let items = tab.querySelectorAll('.book-item, .film-item');

                tab.classList.remove('active');
                if (tab.getAttribute('data-tab-id') == itemsList) {
                    tab.classList.add('active');
                    popovers[itemsList].destroy();

                    if (itemsList) {
                        hiddenLists.forEach(hiddenList => {
                            if (hiddenList.hasAttribute('show-popper') == false) {
                                let hiddenRadios = hiddenList.querySelectorAll('input[type="radio"]'),
                                    hiddenSelected = Array.prototype.slice.call(hiddenRadios).filter(hiddenRadio => hiddenRadio.checked = false);

                                if (hiddenList.hasAttribute('show-popper') !== true && selected == false) {
                                    hiddenSelected.checked = false;
                                }
                            }
                        });
                    }

                    buttons.forEach(button => {

                        navigations.forEach(navigation => {
                            navigation.classList.remove('active');

                            if (tab.getAttribute('data-tab-id') == button.getAttribute('data-popover-toggle') && selected) {
                                button.removeAttribute('open-popover');
                                list.removeAttribute('show-popper');

                                if (list.getAttribute('id') == button.getAttribute('data-popover-toggle') && list.hasAttribute('show-popper') == true) {
                                    button.classList.remove('active');
                                } else {
                                    button.classList.add('active');
                                }
                            }

                            if (('ontouchstart' in window) ||
                                (navigator.maxTouchPoints > 0) ||
                                (navigator.msMaxTouchPoints > 0)) {
                                navigation.addEventListener('touchstart', () => {
                                    if (tab.getAttribute('data-tab-id') !== navigation.getAttribute('data-tab-toggle')) {
                                        button.classList.remove('active');
                                        button.removeAttribute('open-popover');
                                        list.removeAttribute('show-popper');
                                        popovers[itemsList].destroy();
                                    }
                                });
                            } else {
                                navigation.addEventListener('click', () => {
                                    if (tab.getAttribute('data-tab-id') !== navigation.getAttribute('data-tab-toggle')) {
                                        button.classList.remove('active');
                                        button.removeAttribute('open-popover');
                                        list.removeAttribute('show-popper');
                                        popovers[itemsList].destroy();
                                    }
                                });
                            }
                        });
                    });

                    items.forEach(item => {
                        if (item.hasAttribute('data-' + itemsList.substring(0, itemsList.length - 1) + '-type', true) && item.getAttribute('data-' + itemsList.substring(0, itemsList.length - 1) + '-type') && item.getAttribute('data-' + itemsList.substring(0, itemsList.length - 1) + '-type') !== null) {
                            if (e.target.getAttribute('value') == item.getAttribute('data-' + itemsList.substring(0, itemsList.length - 1) + '-type')) {
                                item.parentElement.classList.remove('d-none');
                            } else {
                                item.parentElement.classList.add('d-none');
                            }

                            list.querySelector('form').addEventListener('reset', () => {
                                item.parentElement.classList.remove('d-none');
                            });
                        }
                    });
                }

            });

        }

        this.swiperArticles.update();
        this.swiperArticles.slideTo(0);
        this.swiperBooks.update();
        this.swiperBooks.slideTo(0);
        this.swiperPodcasts.update();
        this.swiperPodcasts.slideTo(0);
        this.swiperFilms.update();
        this.swiperFilms.slideTo(0);
        this.swiperInspiration.update();
        this.swiperInspiration.slideTo(0);
    }

    checkNav(e) {
        let hiddenLists = document.querySelectorAll('.popover-recommendations')

        if (e.currentTarget.classList.contains('active') !== true) {
            hiddenLists.forEach(hiddenList => {
                if (hiddenList.hasAttribute('show-popper') == false) {
                    let hiddenRadios = hiddenList.querySelectorAll('input[type="radio"]'),
                        hiddenSelected = Array.prototype.slice.call(hiddenRadios).filter(hiddenRadio => hiddenRadio.checked = false);

                    hiddenSelected;
                }
            });
        }
    }
}

new Recommendations;