<?php

namespace App\Exports;

use App\Http\Resources\Admin\UserExportResource;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public $items = false;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function collection()
    {
        return UserExportResource::collection($this->items);
    }

    public function headings(): array
    {
        return ["ID", "ФИО", "Email", 'Дата регистрации', 'Группа', 'О себе', 'Дата рождения', 'Телефон', 'Город', 'Соц. сети', 'Место работы', 'Портфолио', 'Фото', 'Последний вход'];
    }
}
