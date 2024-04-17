@extends('layouts.app')

@section('title', 'Компоненты - Лагерь креативных лидеров')

@section('content')
<section class="section section-content section-login" style="padding:10% 0;">
    <!-- include ('blocks.plug') -->
    <div class="container">
        <div class="row g-5">
            <div class="col-12">
                <div class="row g-4">
                    <div class="col-auto">
                        <h5 style="background:yellow;">Типография</h5>
                    </div>
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-12">
                                <h1>Заголовок</h1>
                            </div>
                            <div class="col-12">
                                <h2>Заголовок</h2>
                            </div>
                            <div class="col-12">
                                <h3>Заголовок</h3>
                            </div>
                            <div class="col-12">
                                <h4>Заголовок</h4>
                            </div>
                            <div class="col-12">
                                <h5>Заголовок</h5>
                            </div>
                            <div class="col-12">
                                <h6>Заголовок</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-12">
                                <span class="text-1">Какой-то текст, написанный автором...</span>
                            </div>
                            <div class="col-12">
                                <span class="text-2">Какой-то текст, написанный автором...</span>
                            </div>
                            <div class="col-12">
                                <span class="text-3">Какой-то текст, написанный автором...</span>
                            </div>
                            <div class="col-12">
                                <span class="text-4">Какой-то текст, написанный автором...</span>
                            </div>
                            <div class="col-12">
                                <span class="text-5">Какой-то текст, написанный автором...</span>
                            </div>
                            <div class="col-12">
                                <span class="text-6">Какой-то текст, написанный автором...</span>
                            </div>
                            <div class="col-12">
                                <span class="text-7">Какой-то текст, написанный автором...</span>
                            </div>
                            <div class="col-12">
                                <span class="text-8">Какой-то текст, написанный автором...</span>
                            </div>
                            <div class="col-12">
                                <span class="text-9">Какой-то текст, написанный автором...</span>
                            </div>
                            <div class="col-12">
                                <span class="text-10">Какой-то текст, написанный автором...</span>
                            </div>
                            <div class="col-12">
                                <span class="text-11">Какой-то текст, написанный автором...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row g-4">
                    <div class="col-auto">
                        <h5 style="background:yellow;">Кнопки</h5>
                    </div>
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-primary">Кнопка</button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-primary" disabled>Кнопка</button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-outline-primary">Кнопка</button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-outline-primary" disabled>Кнопка</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-primary">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-primary" disabled>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-outline-primary">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-outline-primary" disabled>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-primary">
                                            <span class="btn-icon-text">Кнопка</span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-primary" disabled>
                                            <span class="btn-icon-text">Кнопка</span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-outline-primary">
                                            <span class="btn-icon-text">Кнопка</span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-outline-primary" disabled>
                                            <span class="btn-icon-text">Кнопка</span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-primary">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                            </svg>
                                            <span class="btn-icon-text">Кнопка</span>
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-primary" disabled>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                            </svg>
                                            <span class="btn-icon-text">Кнопка</span>
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-outline-primary">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                            </svg>
                                            <span class="btn-icon-text">Кнопка</span>
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-outline-primary" disabled>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                            </svg>
                                            <span class="btn-icon-text">Кнопка</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row g-4">
                    <div class="col-auto">
                        <h5 style="background:yellow;">Чекбоксы, радио, свитчи и селекты</h5>
                    </div>
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Checked checkbox
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled>
                                            <label class="form-check-label" for="flexCheckDisabled">
                                                Disabled checkbox
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked disabled>
                                            <label class="form-check-label" for="flexCheckCheckedDisabled">
                                                Disabled checked checkbox
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Default radio
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Default checked radio
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" disabled>
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                Default radio
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" disabled checked>
                                            <label class="form-check-label" for="flexRadioDefault4">
                                                Default checked radio
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-auto">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDisabled" disabled>
                                            <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                            <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-3">
                                    <div class="col-auto">
                                        <select class="form-select form-select-sm" aria-label="Default select example small">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select" aria-label="Default select example normal">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select form-select-lg" aria-label="Default select example large">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row g-4">
                    <div class="col-auto">
                        <h5 style="background:yellow;">Модальные окна (popup)</h5>
                    </div>
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-auto">
                                <a href="javascript://" class="btn btn-icon btn-primary" data-modal-open="sample-modal">
                                    <span class="btn-icon-text">Вызвать popup 1</span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="javascript://" class="btn btn-icon btn-primary" data-modal-open="sample-modal2">
                                    <span class="btn-icon-text">Вызвать popup 2</span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                    </svg>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="javascript://" class="btn btn-icon btn-primary" data-modal-open="sample-modal3">
                                    <span class="btn-icon-text">Вызвать popup 3</span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#020726" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2929 7.29289C11.6834 6.90237 12.3166 6.90237 12.7071 7.29289L16.7071 11.2929C17.0976 11.6834 17.0976 12.3166 16.7071 12.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071C10.9024 16.3166 10.9024 15.6834 11.2929 15.2929L14.5858 12L11.2929 8.70711C10.9024 8.31658 10.9024 7.68342 11.2929 7.29289Z" fill="#020726" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 12C7 11.4477 7.44772 11 8 11H16C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13H8C7.44772 13 7 12.5523 7 12Z" fill="#020726" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('modals')
<div class="modal" data-modal-id="sample-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Ваши личные данные <br>
                    успешно изменены!
                </h6>
            </div>
            <div class="modal-body">
                <div class="text-6 text-center">
                    Сведения о вашей учетной <br>
                    записи были обновленны.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" data-modal-id="sample-modal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Ваша заявка <br>
                    на рассмотрении
                </h6>
            </div>
            <div class="modal-body">
                <div class="text-6 text-center">
                    Мы оповестим вас по <br>
                    указанным контактам <br>
                    о следующих этапах <br>
                    конкурса.
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" data-modal-id="sample-modal3">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="modal-close" btn-close-modal></button>
            <div class="modal-title">
                <h6>
                    Ваша заявка <br>
                    успешно изменена
                </h6>
            </div>
            <div class="modal-body">
                <div class="text-6 text-center">
                    Вы можете вносить <br>
                    корректировки до начала <br>
                    оценки экспертами.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection