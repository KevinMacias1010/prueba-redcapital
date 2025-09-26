<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TestExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Precio'
        ];
    }

    public function collection()
    {
        return collect([
            [1, 'Producto 1', 100.00],
            [2, 'Producto 2', 200.00],
            [3, 'Producto 3', 300.00],
        ]);
    }
}


