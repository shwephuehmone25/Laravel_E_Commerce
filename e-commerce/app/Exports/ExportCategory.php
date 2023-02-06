<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportCategory implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        return Category::select('id', 'name', 'created_at', 'updated_at')->get();
    }

    public function headings(): array
    {

        return [
            'id',
            'name',
            'created_at',
            'updated_at',
        ];
    }
}