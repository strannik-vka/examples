<?php

namespace App\Exports;

use App\Http\Resources\Admin\TestAnswerExportResource;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TestAnswerExport implements FromCollection, WithHeadings
{
    public $items = false;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function collection()
    {
        return TestAnswerExportResource::collection($this->items);
    }

    public function headings(): array
    {
        return ['Пользователь', 'Email', 'Урок', 'Ответы', 'Текстовое поле', 'Выбранный файл', 'Кол-во правильных', 'Дата и время'];
    }
}
