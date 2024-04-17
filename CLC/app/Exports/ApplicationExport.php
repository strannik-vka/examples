<?php

namespace App\Exports;

use App\Http\Resources\Admin\ApplicationExportResource;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ApplicationExport implements FromCollection, WithHeadings
{
    public $items = false;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function collection()
    {
        return ApplicationExportResource::collection($this->items);
    }

    public function headings(): array
    {
        return ["ФИО профиля", "Регион/Город", "О себе", 'Место работы/учебы', 'Название', 'Сферы деятельности', 'Юридический статус', 'Сайт', 'ФИО лидера', 'Дата рождения', 'Email', 'Телефон', 'Соц-сеть', 'Регион', 'Город', 'Личное портфолио', 'О команде', 'Мотивация', 'Видеообращение', 'Портфолио команды', 'Источник', 'Миссия, цели', 'Экономическая значимость', 'Социальная значимость', 'Уровень медийности', 'Дата и время', 'Общая оценка'];
    }
}
