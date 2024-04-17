import '../../../admined';

Admined.page('post', 'Новости', {
    middleware: ['admin', 'applicationModer'],
    form: [
        {
            name: 'id',
            placeholder: 'ID',
            center: true,
            readonly: true
        },
        {
            name: 'category_id',
            placeholder: 'Категория',
            type: 'select'
        },
        {
            name: 'name',
            placeholder: 'Название'
        },
        {
            name: 'image',
            placeholder: 'Обложка',
            type: 'file',
            thumb: 640,
            deleteRequest: true,
        },
        {
            name: 'content',
            placeholder: 'Контент',
            type: 'constructor',
            defaultFields: ['texteditor', 'image', 'video', 'audio', 'poll'],
            fields: [
                {
                    name: 'numbers3',
                    placeholder: 'Цифры 3шт.',
                    description: 'Блок с 3 цифрами',
                    type: 'fields',
                    fields: [
                        {
                            name: '[_1][value]',
                            placeholder: 'Цифра 1'
                        },
                        {
                            name: '[_1][text]',
                            placeholder: 'Описание 1'
                        },
                        {
                            name: '[_2][value]',
                            placeholder: 'Цифра 2'
                        },
                        {
                            name: '[_2][text]',
                            placeholder: 'Описание 2'
                        },
                        {
                            name: '[_3][value]',
                            placeholder: 'Цифра 3'
                        },
                        {
                            name: '[_3][text]',
                            placeholder: 'Описание 3'
                        }
                    ]
                },
                {
                    name: 'numbers6',
                    placeholder: 'Цифры 6шт.',
                    description: 'Блок с 6 цифрами',
                    type: 'fields',
                    fields: [
                        {
                            name: '[_1][value]',
                            placeholder: 'Цифра 1'
                        },
                        {
                            name: '[_1][text]',
                            placeholder: 'Описание 1'
                        },
                        {
                            name: '[_2][value]',
                            placeholder: 'Цифра 2'
                        },
                        {
                            name: '[_2][text]',
                            placeholder: 'Описание 2'
                        },
                        {
                            name: '[_3][value]',
                            placeholder: 'Цифра 3'
                        },
                        {
                            name: '[_3][text]',
                            placeholder: 'Описание 3'
                        },
                        {
                            name: '[_4][value]',
                            placeholder: 'Цифра 4'
                        },
                        {
                            name: '[_4][text]',
                            placeholder: 'Описание 4'
                        },
                        {
                            name: '[_5][value]',
                            placeholder: 'Цифра 5'
                        },
                        {
                            name: '[_5][text]',
                            placeholder: 'Описание 5'
                        },
                        {
                            name: '[_6][value]',
                            placeholder: 'Цифра 6'
                        },
                        {
                            name: '[_6][text]',
                            placeholder: 'Описание 6'
                        }
                    ]
                },
                {
                    name: 'blocks',
                    placeholder: 'Блоки',
                    description: 'Блоки с текстами',
                    type: 'array',
                    fields: [
                        {
                            name: '[title][]',
                            placeholder: 'Заголовок'
                        },
                        {
                            name: '[text][]',
                            placeholder: 'Текст'
                        }
                    ]
                }
            ],
            screen: {
                texteditor: '/img/screen/text.png',
                image: '/img/screen/image.png',
                video: '/img/screen/video.png',
                audio: '/img/screen/audio.png',
                numbers3: '/img/screen/numbers3.png',
                numbers6: '/img/screen/numbers6.png',
                blocks: '/img/screen/blocks.png',
                poll: '/img/screen/poll.png'
            }
        },
        {
            name: 'created_at',
            placeholder: 'Дата публикации',
            description: 'Формат 2022-03-14 16:59',
            type: 'datetime',
            value: new Date()
        },
        {
            name: 'published',
            placeholder: 'Опубликован',
            type: 'switch'
        }
    ]
});

Admined.page('meeting', 'Онлайн-встречи', {
    middleware: ['admin', 'applicationModer'],
    form: [
        {
            name: 'id',
            placeholder: 'ID',
            center: true,
            readonly: true
        },
        {
            name: 'category_id',
            placeholder: 'Категория',
            type: 'select'
        },
        {
            name: 'name',
            placeholder: 'Название'
        },
        {
            name: 'image',
            placeholder: 'Обложка',
            type: 'file',
            thumb: 640,
            deleteRequest: true,
        },
        {
            name: 'description',
            placeholder: 'Описание',
            type: 'text',
        },
        {
            name: 'videoSrc',
            placeholder: 'Ссылка на видео',
            type: 'string'
        },
        {
            name: 'created_at',
            placeholder: 'Дата публикации',
            description: 'Формат 2022-03-14 16:59',
            type: 'datetime',
            value: new Date()
        },
        {
            name: 'published',
            placeholder: 'Опубликован',
            type: 'switch'
        }
    ]
});

Admined.page('category', 'Категории', {
    middleware: 'admin',
    parent: 'post',
    form: [
        {
            name: 'id',
            placeholder: 'ID',
            center: true,
            readonly: true
        },
        {
            name: 'name',
            placeholder: 'Название'
        },
        {
            name: 'slug',
            placeholder: 'ЧПУ'
        },
        {
            name: 'sort',
            placeholder: 'Сортировка'
        },
        {
            name: 'published',
            placeholder: 'Опубликован',
            type: 'switch'
        }
    ]
});

Admined.page('user', 'Пользователи', {
    middleware: 'admin',
    actions: [
        {
            href: '/admin/user?excel=1',
            text: 'Excel',
            target: '_blank'
        }
    ],
    form: [
        {
            name: 'id',
            placeholder: 'ID',
            center: true,
            readonly: true
        },
        {
            name: 'name',
            placeholder: 'ФИО'
        },
        {
            name: 'email',
            placeholder: 'Email'
        },
        {
            name: 'group_id',
            placeholder: 'Группа',
            type: 'select'
        },
        {
            name: 'subtype_id',
            placeholder: 'Тип рассылки',
            type: 'select'
        },
        {
            name: 'password',
            placeholder: 'Пароль',
            filter: false
        },
        {
            name: 'password_confirmation',
            placeholder: 'Повторите пароль',
            filter: false
        },
        {
            name: 'password_view',
            placeholder: 'Пароль отображаемый',
            readonly: true
        },
        {
            name: 'created_at',
            placeholder: 'Создан',
            type: 'datetime',
            readonly: true
        }
    ]
});

Admined.page('BlockExpert', 'Блок эксперты', {
    middleware: 'admin',
    form: [
        {
            name: 'id',
            placeholder: 'ID',
            center: true,
            readonly: true
        },
        {
            name: 'name',
            placeholder: 'ФИО'
        },
        {
            name: 'position',
            placeholder: 'Должность'
        },
        {
            name: 'photo',
            placeholder: 'Фото',
            type: 'file',
            thumb: 500
        },
        {
            name: 'sort',
            placeholder: 'Порядок',
            value: 500
        },
        {
            name: 'published',
            placeholder: 'Опубликован',
            type: 'switch'
        }
    ]
});

Admined.page('BlockProfessional', 'Блок профессионалы', {
    middleware: 'admin',
    form: [
        {
            name: 'id',
            placeholder: 'ID',
            center: true,
            readonly: true
        },
        {
            name: 'name',
            placeholder: 'ФИО'
        },
        {
            name: 'position',
            placeholder: 'Должность'
        },
        {
            name: 'photo',
            placeholder: 'Фото',
            type: 'file',
            thumb: 500
        },
        {
            name: 'sort',
            placeholder: 'Порядок',
            value: 500
        },
        {
            name: 'published',
            placeholder: 'Опубликован',
            type: 'switch'
        }
    ]
});

Admined.page('application', 'Заявки', {
    middleware: ['admin', 'applicationModer'],
    addAction: false,
    deleteAction: false,
    items: {
        copy: false,
    },
    actions: [
        {
            href: '/admin/application?excel=1',
            text: 'Excel',
            target: '_blank'
        }
    ],
    form: [
        {
            name: 'id',
            placeholder: 'ID',
            center: true,
            readonly: true
        },
        {
            name: 'status_id',
            placeholder: 'Статус',
            type: 'select'
        },
        {
            name: 'name',
            placeholder: 'Название'
        },
        {
            name: 'activity_spheres[]',
            placeholder: 'Сферы деятельности',
            type: 'select',
        },
        {
            name: 'juridical_status',
            placeholder: 'Юридический статус'
        },
        {
            name: 'website',
            placeholder: 'Сайт'
        },
        {
            name: 'fio',
            placeholder: 'ФИО лидера'
        },
        {
            name: 'birthday',
            placeholder: 'Дата рождения',
            type: 'datetime'
        },
        {
            name: 'email',
            placeholder: 'Email'
        },
        {
            name: 'phone',
            placeholder: 'Телефон'
        },
        {
            name: 'social_network',
            placeholder: 'Соц-сеть'
        },
        {
            name: 'region',
            placeholder: 'Регион'
        },
        {
            name: 'city',
            placeholder: 'Город'
        },
        {
            name: 'portfolio',
            placeholder: 'Личное портфолио'
        },
        {
            name: 'portfolio_file',
            placeholder: 'Личное портфолио',
            type: 'file'
        },
        {
            name: 'about_team',
            placeholder: 'О команде',
            type: 'text'
        },
        {
            name: 'motivation',
            placeholder: 'Мотивация',
            type: 'text'
        },
        {
            name: 'video',
            placeholder: 'Видеообращение',
        },
        {
            name: 'portfolio_team',
            placeholder: 'Портфолио команды',
            type: 'file'
        },
        {
            name: 'mission',
            placeholder: 'Миссия',
            type: 'text'
        },
        {
            name: 'social',
            placeholder: 'Соц. значимость',
            type: 'text'
        },
        {
            name: 'economic',
            placeholder: 'Экон. значимость',
            type: 'text'
        },
        {
            name: 'levels_media',
            placeholder: 'Уровень медийности',
            type: 'text'
        },
        {
            name: 'user.name',
            with: 'user',
            text_key: 'name',
            placeholder: 'ФИО профиля',
            readonly: true
        },
        {
            name: 'user.city',
            with: 'user',
            text_key: 'city',
            placeholder: 'Регион/Город',
            readonly: true
        },
        {
            name: 'user.about',
            with: 'user',
            text_key: 'about',
            placeholder: 'О себе',
            readonly: true
        },
        {
            name: 'user.place_work',
            with: 'user',
            text_key: 'place_work',
            placeholder: 'Место работы/учебы',
            readonly: true
        },
        {
            name: 'source',
            placeholder: 'Источник'
        },
        {
            name: 'created_at',
            placeholder: 'Дата и время',
            readonly: true,
            type: 'datetime'
        }
    ]
});

Admined.page('expert', 'Эксперты', {
    middleware: ['admin', 'applicationModer', 'expertModer'],
    editAction: false,
    addAction: false,
    deleteAction: false,
    form: [
        {
            name: 'name',
            placeholder: 'ФИО',
            with: 'user',
            text_key: 'name',
            readonly: true
        },
        {
            name: 'email',
            placeholder: 'Email',
            with: 'user',
            text_key: 'email',
            readonly: true
        },
        {
            name: 'last_online_at',
            placeholder: 'Последнее посещение',
            with: 'user',
            text_key: 'last_online_at',
            type: 'datetime',
            readonly: true
        },
        {
            name: 'stat',
            placeholder: 'Оценено',
            filter: 'readonly',
            readonly: true,
        }
    ]
});

Admined.page('evaluation', 'Оценки', {
    middleware: ['admin', 'applicationModer'],
    parent: 'expert',
    editAction: false,
    addAction: false,
    deleteAction: false,
    form: [
        {
            name: 'expert',
            placeholder: 'Эксперт',
            readonly: true
        },
        {
            name: 'name',
            placeholder: 'Название команды',
            readonly: true
        },
        {
            name: 'fio',
            placeholder: 'ФИО лидера',
            readonly: true
        },
        {
            name: 'total',
            placeholder: 'Оценка',
            readonly: true
        },
        {
            name: 'comment',
            placeholder: 'Комментарий',
            readonly: true,
        },
        {
            name: 'updated_at',
            placeholder: 'Дата оценки',
            type: 'datetime',
            readonly: true,
        }
    ]
});

Admined.page('mailing', 'Рассылка', {
    middleware: 'admin',
    form: [
        {
            name: 'id',
            placeholder: 'ID',
            center: true,
            readonly: true
        },
        {
            name: 'name',
            placeholder: 'Название'
        },
        {
            name: 'stat',
            placeholder: 'Отправлено',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'sort',
            placeholder: 'Сортировка'
        },
        {
            name: 'view',
            placeholder: 'Файл',
            type: 'select'
        },
        {
            name: 'status_id',
            placeholder: 'Статус',
            type: 'select'
        },
        {
            name: 'users_filter',
            placeholder: 'Фильтр'
        },
        {
            name: 'email_list',
            placeholder: 'Email список'
        },
        {
            name: 'created_at',
            placeholder: 'Дата',
            type: 'datetime',
            readonly: true
        },
    ]
});

Admined.page('partner', 'Партнеры', {
    middleware: 'admin',
    form: [
        {
            name: 'category_id',
            placeholder: 'Категория',
            type: 'select'
        },
        {
            name: 'name',
            placeholder: 'Название'
        },
        {
            name: 'url',
            placeholder: 'Ссылка'
        },
        {
            name: 'logo',
            placeholder: 'Логотип',
            type: 'file'
        },
        {
            name: 'sort',
            placeholder: 'Порядок',
            value: 500
        },
        {
            name: 'published',
            placeholder: 'Опубликован',
            type: 'switch'
        }
    ]
});

Admined.page('PartnerCategory', 'Категории', {
    middleware: 'admin',
    parent: 'partner',
    form: [
        {
            name: 'name',
            placeholder: 'Название'
        },
        {
            name: 'sort',
            placeholder: 'Порядок',
            value: 500
        },
        {
            name: 'published',
            placeholder: 'Опубликован',
            type: 'switch'
        }
    ]
});

Admined.page('course', 'Курсы', {
    middleware: 'admin',
    form: [
        {
            name: 'id',
            placeholder: 'ID',
            center: true,
            readonly: true
        },
        {
            name: 'name',
            placeholder: 'Название',
        },
        {
            name: 'description',
            placeholder: 'Описание',
            type: 'text'
        },
        {
            name: 'lessons_count',
            placeholder: 'Кол-во уроков',
            readonly: true
        },
        {
            name: 'lessons_start_count',
            placeholder: 'Начали проходить',
            readonly: true
        },
        {
            name: 'lessons_end_count',
            placeholder: 'Закончили проходить',
            readonly: true
        },
        // {
        //     name: 'image',
        //     placeholder: 'Обложка',
        //     type: 'file',
        //     thumb: 640
        // }
    ]
});

Admined.page('LessonAnalyticGroup', 'Аналитика по урокам', {
    middleware: 'admin',
    parent: 'course',
    form: [
        {
            name: 'course_id',
            placeholder: 'Курс',
            with: 'course',
            text_key: 'name',
            readonly: true,
        },
        {
            name: 'lesson_id',
            placeholder: 'Урок',
            with: 'lesson',
            text_key: 'name',
            readonly: true,
        },
        {
            name: 'users_count',
            placeholder: 'Кол-во пользователей',
            href: '/admin?url=LessonAnalytic&lesson_name={lesson.name}',
            target: '_blank',
            readonly: true,
        },
        {
            name: 'views_count',
            placeholder: 'Кол-во заходов',
            readonly: true,
        },
        {
            name: 'answers_count',
            placeholder: 'Кол-во домашек',
            readonly: true,
        }
    ],
    addAction: false,
    deleteAction: false,
    editAction: false,
});

Admined.page('LessonAnalytic', 'Аналитика по пользователям', {
    middleware: 'admin',
    parent: 'course',
    form: [
        {
            name: 'user_name',
            with: 'user',
            text_key: 'name',
            placeholder: 'ФИО',
            readonly: true
        },
        {
            name: 'passed_sum',
            placeholder: 'Кол-во пройденных уроков',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'views_count_sum',
            placeholder: 'Кол-во заходов',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'updated_at',
            placeholder: 'Время последнего захода',
            type: 'datetime',
            readonly: true,
            filter: 'readonly'
        }
    ],
    addAction: false,
    deleteAction: false,
    editAction: false,
});

Admined.page('lesson', 'Уроки', {
    middleware: 'admin',
    parent: 'course',
    form: [
        {
            url: '/admin/course',
            name: 'course_id',
            placeholder: 'Курс',
            type: 'select'
        },
        {
            name: 'number',
            placeholder: 'Номер урока',
        },
        {
            name: 'name',
            placeholder: 'Название',
        },
        {
            name: 'shortName',
            description: 'Отображается в левой части сайта',
            placeholder: 'Короткое название'
        },
        {
            name: 'block',
            placeholder: 'Блок',
            description: 'Например: Устройство сценария',
            filter: false
        },
        {
            name: 'description',
            placeholder: 'Описание',
            type: 'text',
            filter: false
        },
        {
            name: 'contents',
            placeholder: 'Содержание',
            type: 'texteditor',
            filter: false
        },
        {
            name: 'links',
            placeholder: 'Полезные материалы',
            type: 'texteditor',
            filter: false
        },
        {
            name: 'video_code',
            placeholder: 'Видео код',
            max: 255,
            filter: false
        },
        {
            name: 'duration',
            placeholder: 'Продолжительность',
        },
        {
            name: 'presentation',
            placeholder: 'Презентация',
            type: 'file',
            deleteRequest: true,
            filter: false
        },
        {
            name: 'start_at',
            description: 'Дата и время начала урока, формат: 2020-02-17 00:00',
            placeholder: 'Начало урока',
            type: 'datetime'
        },
        {
            name: 'speaker',
            placeholder: 'Спикер',
            type: 'array',
            fields: [
                {
                    name: 'speaker[name][]',
                    placeholder: 'ФИО'
                },
                {
                    name: 'speaker[position][]',
                    placeholder: 'Должность'
                },
                {
                    name: 'speaker[about][]',
                    placeholder: 'О спикере',
                    type: 'text'
                },
                {
                    name: 'speaker[photo][]',
                    placeholder: 'Фотография',
                    type: 'file'
                },
                {
                    name: 'speaker[socials][]',
                    description: 'Ссылки на соц.сети через запятую',
                    placeholder: 'Соц.сети'
                }
            ]
        }
    ]
});

Admined.page('test', 'Тестирование', {
    middleware: 'admin',
    parent: 'course',
    form: [
        {
            url: '/admin/lesson',
            name: 'lesson_id',
            placeholder: 'Урок',
            type: 'select'
        },
        {
            name: 'name',
            placeholder: 'Название'
        },
        {
            name: 'description',
            placeholder: 'Описание',
            type: 'texteditor'
        },
        {
            name: 'duration',
            placeholder: 'Продолжительность'
        },
        {
            name: 'content',
            placeholder: 'Вопросы',
            type: 'constructor',
            defaultFields: ['poll'],
            options: {
                poll: {
                    userVariant: true,
                    multiVariant: true,
                    correctVariant: true,
                }
            }
        },
        {
            name: 'isInputText',
            description: 'Отображать поле ввода текста домашнего задания',
            placeholder: 'Текстовое поле',
            type: 'switch',
        },
        {
            name: 'isInputFile',
            description: 'Отображать поле приклепления файла домашнего задания',
            placeholder: 'Загрузка файла',
            type: 'switch',
        }
    ]
});

Admined.page('TestAnswer', 'Результаты тестов', {
    middleware: 'admin',
    parent: 'course',
    actions: [
        {
            href: '/admin/TestAnswer?excel=1',
            text: 'Excel',
            target: '_blank'
        }
    ],
    form: [
        {
            name: 'test_id',
            placeholder: 'Урок',
            type: 'select',
            readonly: true,
        },
        {
            url: '/admin/user/',
            name: 'user_id',
            placeholder: 'Пользователь',
            type: 'select',
            readonly: true,
        },
        {
            name: 'user.email',
            with: 'user',
            text_key: 'email',
            placeholder: 'Email',
            readonly: true,
        },
        {
            name: 'answers',
            placeholder: 'Ответы',
            readonly: true,
            type: 'text',
            filter: 'readonly'
        },
        {
            name: 'text',
            placeholder: 'Текстовое поле',
            type: 'text',
            readonly: true,
        },
        {
            name: 'file',
            placeholder: 'Выбран файл',
            type: 'file',
            readonly: true,
        },
        {
            name: 'correct_answers_count',
            placeholder: 'Кол-во правильных',
            readonly: true,
        },
        {
            name: 'comment',
            placeholder: 'Комментарий',
            type: 'text',
        },
        {
            name: 'updated_at',
            placeholder: 'Дата и время',
            readonly: true,
            type: 'datetime'
        },
    ],
    addAction: false,
    deleteAction: false,
});

// Admined.page('opinion', 'Мнение о курсе', {
//     middleware: 'admin',
//     parent: 'course',
//     form: [
//         {
//             url: '/admin/course',
//             name: 'course_id',
//             placeholder: 'Курс',
//             type: 'select'
//         },
//         {
//             name: 'answer_fields',
//             placeholder: 'Вопросы для мнения',
//             description: 'На какие вопросы отвечает пользователь',
//             type: 'constructor',
//             defaultFields: ['poll'],
//             options: {
//                 poll: {
//                     userVariant: true,
//                     multiVariant: true,
//                 }
//             }
//         },
//         {
//             name: 'user_fields',
//             placeholder: 'Расскажи о себе',
//             description: 'Какие поля заполняет пользователь',
//             type: 'constructor',
//             defaultFields: ['poll'],
//             options: {
//                 poll: {
//                     userVariant: true,
//                 }
//             }
//         },
//     ]
// });

Admined.page('OpinionAnswer', 'Мнения о курсе', {
    middleware: 'admin',
    parent: 'course',
    addAction: false,
    deleteAction: false,
    editAction: false,
    actions: [
        {
            href: '/admin/OpinionAnswer?excel=1',
            text: 'Excel',
            target: '_blank'
        }
    ],
    form: [
        {
            name: 'opinion_id',
            placeholder: 'Курс',
            type: 'select'
        },
        {
            url: '/admin/user',
            name: 'user_id',
            placeholder: 'Пользователь',
            type: 'select'
        },
        {
            name: 'updated_at',
            placeholder: 'Время',
            type: 'datetime',
            readonly: true,
        },
        {
            name: 'name',
            placeholder: 'ФИО',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'contact',
            placeholder: 'Контакт',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'city',
            placeholder: 'Регион',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'work',
            placeholder: 'Бизнес',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'industry',
            placeholder: 'Индустрия',
            readonly: true,
            filter: 'readonly'
        },

        {
            name: 'answer_1',
            placeholder: 'Насколько полезен',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'answer_2',
            placeholder: 'Удобство прохождения',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'answer_3',
            placeholder: 'Сложность заданий',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'answer_4',
            placeholder: 'Общее впечатление',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'answer_5',
            placeholder: 'Самое ценное',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'answer_6',
            placeholder: 'Интересные темы',
            readonly: true,
            filter: 'readonly'
        },
        {
            name: 'answer_7',
            placeholder: 'Предложения по развитию',
            readonly: true,
            filter: 'readonly'
        }
    ]
});

Admined.page('CoursePrice', 'Цены на курсы', {
    middleware: 'admin',
    parent: 'course',
    form: [
        {
            name: 'id',
            placeholder: 'ID',
            center: true,
            readonly: true
        },
        {
            url: '/admin/course',
            name: 'course_id',
            placeholder: 'Курс',
            type: 'select'
        },
        {
            name: 'amount',
            placeholder: 'Цена',
        },
    ]
});