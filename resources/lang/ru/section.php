<?php

return [
    'index' => [
        'title' => 'Список отделов',
        'nav' => 'Отделы',
        'modal' => [
            'title' => 'Подтвердите действие',
            'confirm' => 'Вы действитель хотите удалить отдел :name'
        ]
    ],
    'create' => [
        'title' => 'Создать раздел'
    ],
    'edit' => [
        'name' => [
            'label' => 'Название',
            'placeholder' => 'Введите название'
        ],
        'description' => [
            'label' => 'Описание'
        ],
        'file' => [
            'label' => 'Лого',
            'placeholder' => 'Вырерите  изображение'
        ]
    ],
    'validation' => [
        'name' => [
            'required' => 'Поле "Название" обязательно для заполнения',
            'max' => 'Максимальная длина не сожет превышать 255 символов'
        ],
        'logo' => [
            'image' => 'Можно загружать только изображения',
            'max' => 'Максимальный размер изображения не может превышать 2МБ'
        ]
    ]
];

//section.edit.error.name.required
//section.edit.error.name.max
//section.edit.error.name.image
//section.edit.error.name.max
