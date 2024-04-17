<?php

namespace App\Exports;

use App\Http\Resources\Admin\EvaluationExportResource;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EvaluationExport implements FromCollection, WithHeadings
{
    public $items = false;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function collection()
    {
        return EvaluationExportResource::collection($this->items);
    }

    public function headings(): array
    {
        return [
            "Фио лидера",
            "Название команды",
            "Общая информация о команде",
            "Видеовизитка",
            "Эксперт",
            "Общая оценка",
            "Комментарий",
            "Презентация",
        ];
    }
}
