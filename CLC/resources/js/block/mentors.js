import Swiper from "swiper/bundle";
import options from '../modules/swiperOptions';
import modalHelpers from "../modules/modal.helpers";

const items = document.querySelectorAll('[data-mentor-id]');

const muteButtons = document.querySelectorAll('[data-mentor-mute]');

class Mentors {
    constructor() {
        this.swiper();
        for (const item of items) {
            item.addEventListener('mouseenter', (e) => {
                this.startVideo(e);
            });
            item.addEventListener('mouseleave', (e) => {
                this.endVideo(e);
            });
            item.addEventListener('touchstart', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.touchStartVideo(e);
            });
            item.addEventListener('touchmove', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.touchEndVideo(e);
            });
        }

        for (const muteButton of muteButtons) {
            muteButton.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.muteVideo(e);
            });

            muteButton.addEventListener('touchstart', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.muteVideo(e);
            });
        }
    }

    swiper() {
        var swiperMentors = new Swiper(".swiper-mentors", $.extend({
            slidesPerView: "auto",
            spaceBetween: 20,
            scrollbar: {
                el: ".mentor-scrollbar",
                draggable: true,
                dragSize: 'auto',
                hide: false,
                snapOnRelease: true,
            },
            navigation: {
                nextEl: '.mentor-btn-next',
                prevEl: '.mentor-btn-prev',
            },
            allowTouchMove: true,
            grabCursor: true,
        }, options));

        setTimeout(function () {
            swiperMentors.update();
        }, 500);

        swiperMentors.on('slideChange', function () {
            let swiperCards = document.querySelectorAll('.swiper-mentors .swiper-slide');

            swiperCards.forEach(element => {
                let video = element.querySelector('video')
                element.querySelector('.mentor-card').classList.remove('mentor-card-playing');

                video.pause();
                video.loop = false;
                video.autoplay = false;
            });
        });
    }

    startVideo(e) {
        let video = e.target.querySelector('video');

        e.target.classList.add('mentor-card-playing');

        for (const item of items) {
            video.play();
            video.loop = true;
            video.autoplay = true;
        }
    }

    touchStartVideo(e) {
        let video = e.currentTarget.querySelector('video'),
            cards = document.querySelectorAll('.mentor-card');

        if (e.currentTarget.classList.contains('mentor-card-playing')) {
            e.currentTarget.classList.remove('mentor-card-playing');

            video.pause();
            video.loop = false;
            video.autoplay = false;
        } else {
            cards.forEach(element => {
                let cardVideos = document.querySelectorAll('video');

                element.classList.remove('mentor-card-playing');
                cardVideos.forEach(cardVideo => {
                    cardVideo.pause();
                    cardVideo.loop = false;
                    cardVideo.autoplay = false;
                });

            });

            e.currentTarget.classList.add('mentor-card-playing');

            video.play();
            video.loop = true;
            video.autoplay = true;
        }
    }

    endVideo(e) {
        let video = e.target.querySelector('video');

        e.target.classList.remove('mentor-card-playing');

        for (const item of items) {
            video.pause();
            video.loop = false;
            video.autoplay = false;
        }
    }

    touchEndVideo(e) {
        let video = e.currentTarget.querySelector('video');

        e.currentTarget.classList.remove('mentor-card-playing');

        video.pause();
        video.loop = false;
        video.autoplay = false;


    }

    muteVideo(e) {
        let muteButton = e.currentTarget,
            video = muteButton.closest('.mentor-card').querySelector('video');

        if (video.muted == true) {
            muteButton.innerHTML = '<svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6561 5.14664C14.8401 4.1599 16.6469 4.87289 16.8381 6.40231C17.4273 11.1158 17.4273 15.8842 16.8381 20.5977C16.6469 22.1271 14.8401 22.8401 13.6561 21.8534L8.77275 17.7839C8.7222 17.7418 8.65849 17.7188 8.59269 17.7188H4.5C3.41269 17.7188 2.53125 16.8373 2.53125 15.75V11.25C2.53125 10.1627 3.41269 9.28125 4.5 9.28125H8.59269C8.65849 9.28125 8.7222 9.25819 8.77275 9.21607L13.6561 5.14664ZM15.1636 6.61162C15.138 6.40625 14.8954 6.31052 14.7364 6.44301L9.85306 10.5124C9.49924 10.8073 9.05326 10.9688 8.59269 10.9688H4.5C4.34467 10.9688 4.21875 11.0947 4.21875 11.25V15.75C4.21875 15.9053 4.34467 16.0313 4.5 16.0313H8.59269C9.05326 16.0313 9.49924 16.1927 9.85306 16.4876L14.7364 20.557C14.8954 20.6895 15.138 20.5938 15.1636 20.3884C15.7354 15.8139 15.7354 11.1861 15.1636 6.61162Z" fill="black"/> <path d="M22.3967 6.689C22.8391 6.54267 23.3164 6.7827 23.4627 7.22512C24.1157 9.19946 24.4688 11.3094 24.4688 13.5C24.4688 15.6907 24.1157 17.8006 23.4627 19.7749C23.3164 20.2173 22.8391 20.4574 22.3967 20.311C21.9543 20.1647 21.7142 19.6874 21.8605 19.245C22.4577 17.4395 22.7813 15.5084 22.7813 13.5C22.7813 11.4917 22.4577 9.56056 21.8605 7.75501C21.7142 7.31259 21.9543 6.83532 22.3967 6.689Z" fill="currentColor"/> <path d="M20.2863 8.94116C20.1256 8.50376 19.6407 8.27946 19.2033 8.44017C18.7659 8.60088 18.5416 9.08574 18.7024 9.52314C19.1574 10.7617 19.4062 12.1008 19.4062 13.5C19.4062 14.6606 19.2351 15.7796 18.9171 16.8341C18.8994 16.8929 18.8812 16.9514 18.8626 17.0098C18.8124 17.167 18.759 17.3227 18.7024 17.4769C18.5416 17.9143 18.7659 18.3991 19.2033 18.5599C19.6407 18.7206 20.1256 18.4963 20.2863 18.0589C20.3513 17.8819 20.4127 17.7032 20.4702 17.5228C20.4916 17.4559 20.5125 17.3887 20.5328 17.3212C20.8978 16.1105 21.0937 14.8274 21.0937 13.5C21.0937 11.8994 20.8089 10.3634 20.2863 8.94116Z" fill="currentColor"/> </svg>';
            video.muted = false;
        } else {
            muteButton.innerHTML = '<svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.6561 5.14664C14.8401 4.1599 16.6469 4.87289 16.8381 6.40231C17.4273 11.1158 17.4273 15.8842 16.8381 20.5977C16.6469 22.1271 14.8401 22.8401 13.6561 21.8534L8.77275 17.7839C8.7222 17.7418 8.65849 17.7188 8.59269 17.7188H4.5C3.41269 17.7188 2.53125 16.8373 2.53125 15.75V11.25C2.53125 10.1627 3.41269 9.28125 4.5 9.28125H8.59269C8.65849 9.28125 8.7222 9.25819 8.77275 9.21607L13.6561 5.14664ZM15.1636 6.61162C15.138 6.40625 14.8954 6.31052 14.7364 6.44301L9.85306 10.5124C9.49924 10.8073 9.05326 10.9688 8.59269 10.9688H4.5C4.34467 10.9688 4.21875 11.0947 4.21875 11.25V15.75C4.21875 15.9053 4.34467 16.0313 4.5 16.0313H8.59269C9.05326 16.0313 9.49924 16.1927 9.85306 16.4876L14.7364 20.557C14.8954 20.6895 15.138 20.5938 15.1636 20.3884C15.7354 15.8139 15.7354 11.1861 15.1636 6.61162Z" fill="currentColor" /><path d="M19.3521 10.9146C19.6817 10.5851 20.2159 10.5851 20.5454 10.9146L21.9375 12.3068L23.3296 10.9146C23.6591 10.5851 24.1934 10.5851 24.5229 10.9146C24.8524 11.2441 24.8524 11.7784 24.5229 12.1079L23.1307 13.5L24.5229 14.8921C24.8524 15.2216 24.8524 15.7559 24.5229 16.0854C24.1934 16.4149 23.6591 16.4149 23.3296 16.0854L21.9375 14.6932L20.5454 16.0854C20.2159 16.4149 19.6816 16.4149 19.3521 16.0854C19.0226 15.7559 19.0226 15.2216 19.3521 14.8921L20.7443 13.5L19.3521 12.1079C19.0226 11.7784 19.0226 11.2441 19.3521 10.9146Z" fill="currentColor" /></svg>';
            video.muted = true;
        }

        muteButton.classList.contains('disabled') ? muteButton.classList.remove('disabled') : muteButton.classList.add('disabled');
    }

    fullscreen(e) {
        if (e.currentTarget.hasAttribute('data-mentor-id')) {
            let video = e.currentTarget.querySelector('video'),
                muteButton = e.currentTarget.querySelector('[data-mentor-mute]');

            modalHelpers.show($('[data-modal-id="modal-mentor-play"]'));

            video.muted = false;
            video.controls = true;

            document.querySelector('[data-mentor-video]').append(video);

            $('[data-modal-id="modal-mentor-play"]').on('hidden', () => {
                for (const item of items) {
                    video.pause();
                    video.controls = false;
                    e.target.closest('.mentor-card').querySelector('.mentor-card-wrapper').append(video);
                    muteButton.classList.contains('disabled') ? video.muted = false : video.muted = true;
                }
            });
        }
    }
}

new Mentors();