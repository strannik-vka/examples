<?php

namespace App\Exports;

use App\Http\Resources\Admin\OpinionAnswerExportResource;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OpinionAnswerExport implements FromCollection, WithHeadings
{
    public $items = false;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function collection()
    {
        return OpinionAnswerExportResource::collection($this->items);
    }

    public function headings(): array
    {
        return ['Курс', 'Пользователь', 'Время', 'ФИО', 'Контакт', 'Регион', 'Бизнес', 'Индустрия', 'Насколько полезен', 'Удобство прохождения', 'Сложность заданий', 'Общее впечатление', 'Самое ценное', 'Интересные темы', 'Предложения по развитию'];
    }
}
