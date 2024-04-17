<section class="section section-content section-mentors">
    <div class="container">
        <div class="section-mentors-inner">
            <div class="section-mentors-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                <h4>
                    Наставники лагеря <br class="d-inline d-md-none">
                    креативных лидеров
                </h4>
            </div>
            <div class="section-mentors-subtitle">
                <div class="row">
                    <div class="col-12 col-md-auto d-none d-md-block">
                        <div class="section-mentors-figure">
                            <div class="section-mentors-icon infiniteStepRotation"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md">
                        <p style="margin:0;">
                            «Мы работаем над тем, чтобы <br class="d-inline d-md-none"> навыки осознанного лидерства <br class="d-inline d-md-none">и креативной <br class="d-none d-md-inline">
                            трансформации <br class="d-inline d-md-none"> бизнесам были триггером <br class="d-inline d-md-none"> финансового роста <br class="d-inline d-md-none"> вашего бизнеса»
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-mentors-content">
        <div class="section-mentors-swiper wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
            <div class="swiper-container swiper-mentors">
                <div class="swiper-wrapper">
                    @for($i = 0; $i < 5; $i++) <div class="swiper-slide">
                        <div class="mentor-card" data-mentor-id="{{ $i + 1 }}">
                            <div class="mentor-card-play">
                                <button type="button" class="btn btn-icon btn-play rounded-circle" data-mentor-play="{{ $i + 1 }}">
                                    <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.19984 4.4C10.2665 5.2 10.2665 6.8 9.19984 7.6L3.8665 11.6C2.54803 12.5889 0.666504 11.6481 0.666504 10L0.666504 2C0.666504 0.351909 2.54803 -0.588855 3.8665 0.399999L9.19984 4.4Z" fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                            <div class="mentor-card-navigation">
                                <button type="button" class="btn btn-primary btn-icon btn-mute" alt="mute" data-mentor-mute="{{ $i + 1 }}">
                                    <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="d-flex">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6561 5.14664C14.8401 4.1599 16.6469 4.87289 16.8381 6.40231C17.4273 11.1158 17.4273 15.8842 16.8381 20.5977C16.6469 22.1271 14.8401 22.8401 13.6561 21.8534L8.77275 17.7839C8.7222 17.7418 8.65849 17.7188 8.59269 17.7188H4.5C3.41269 17.7188 2.53125 16.8373 2.53125 15.75V11.25C2.53125 10.1627 3.41269 9.28125 4.5 9.28125H8.59269C8.65849 9.28125 8.7222 9.25819 8.77275 9.21607L13.6561 5.14664ZM15.1636 6.61162C15.138 6.40625 14.8954 6.31052 14.7364 6.44301L9.85306 10.5124C9.49924 10.8073 9.05326 10.9688 8.59269 10.9688H4.5C4.34467 10.9688 4.21875 11.0947 4.21875 11.25V15.75C4.21875 15.9053 4.34467 16.0313 4.5 16.0313H8.59269C9.05326 16.0313 9.49924 16.1927 9.85306 16.4876L14.7364 20.557C14.8954 20.6895 15.138 20.5938 15.1636 20.3884C15.7354 15.8139 15.7354 11.1861 15.1636 6.61162Z" fill="currentColor" />
                                        <path d="M19.3521 10.9146C19.6817 10.5851 20.2159 10.5851 20.5454 10.9146L21.9375 12.3068L23.3296 10.9146C23.6591 10.5851 24.1934 10.5851 24.5229 10.9146C24.8524 11.2441 24.8524 11.7784 24.5229 12.1079L23.1307 13.5L24.5229 14.8921C24.8524 15.2216 24.8524 15.7559 24.5229 16.0854C24.1934 16.4149 23.6591 16.4149 23.3296 16.0854L21.9375 14.6932L20.5454 16.0854C20.2159 16.4149 19.6816 16.4149 19.3521 16.0854C19.0226 15.7559 19.0226 15.2216 19.3521 14.8921L20.7443 13.5L19.3521 12.1079C19.0226 11.7784 19.0226 11.2441 19.3521 10.9146Z" fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                            <div class="mentor-card-wrapper">
                                <video width="320" height="240" muted="true" playsinline="true">
                                    <source src="/assets/videos/tiser_498.mp4" type="video/mp4">
                                    <source src="/assets/videos/tiser_498.webm" type="video/webm">
                                </video>
                            </div>
                            <div class="mentor-card-content">
                                <div class="mentor-card-position">
                                    наставник
                                </div>
                                <div class="mentor-card-name">
                                    Игорь М. Намаконов
                                </div>
                                <div class="mentor-card-meo">
                                    Генеральный директор Федерации креативных индустрий, автор бестселлера “Кроссфит мозга
                                </div>
                            </div>
                        </div>
                </div>
                @endfor
            </div>
            <div class="swiper-nav">
                <div class="row">
                    <div class="col-auto">
                        <div class="mentor-btn mentor-btn-prev">
                            <img data-src="/assets/images/icons/swiper/mentor/arrow-left.svg" class="lazyload">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="mentor-btn mentor-btn-next">
                            <img data-src="/assets/images/icons/swiper/mentor/arrow-right.svg" class="lazyload">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mentor-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>