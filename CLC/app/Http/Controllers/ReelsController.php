<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ReelsController extends Controller
{
    public function index()
    {
        $videos = [
            [
                'show' => true,
                'name' => 'Игорь М. Намаконов <br>Что такое энергия неведения?',
                'description' => '',
                'code' => '<iframe class="lazyload" data-src="https://rutube.ru/play/embed/29b1bcde12c145bf4f292103116ebaa5?p=slsA-TxciPEaifO5ltwiUg" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
                'seconds' => 30
            ],
            [
                'name' => 'Александр Андрианов <br>Как эго-состояния руководителя влияют на работу всей организации?',
                'description' => '',
                'code' => '<iframe class="lazyload" data-src="https://rutube.ru/play/embed/6baedef5c23b00eb9e1564757f5784e7?p=W8ew8F6lRFUkrmUkA2zuRg" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
                'seconds' => 30
            ],
            [
                'name' => 'Маруся Горфиль <br>Что такое дизайн-мышление?',
                'description' => '',
                'code' => '<iframe class="lazyload" data-src="https://rutube.ru/play/embed/bcc9811c6b2204520be9ea135117695d?p=O74AT67Wcdjw6laAUKvIag" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
                'seconds' => 30
            ],
            [
                'name' => 'Алена Кукушкина <br>Почему коллаборации жизненно важны для бизнеса?',
                'description' => '',
                'code' => '<iframe class="lazyload" data-src="https://rutube.ru/play/embed/79743e13ca352ad051f2259f14fec8a8?p=JzDuPq3XCkikzBWqarIHGQ" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
                'seconds' => 30
            ],
            [
                'name' => 'Дженнет Демидова <br>Какие существуют права на интеллектуальную собственность?',
                'description' => '',
                'code' => '<iframe class="lazyload" data-src="https://rutube.ru/play/embed/e140856b9d534a2a80932999630e0e89?p=-gbdeFTNJ_gXSdGhNY5BDQ" frameBorder="0" allow="clipboard-write; autoplay" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
                'seconds' => 30
            ],
        ];


        return view('landing.reels', [
            'videos' => json_decode(json_encode($videos))
        ]);
    }
}
