<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection,WithHeadings
{

    public function collection()
    {
        return Product::get();
    }

    public function headings(): array
    {
        return [
            'ID'
            ,'Name'
            ,'Description'
            ,'image'
            ,'Buy Price'
            ,'Price'
            ,'Color'
            ,'Active'
        ];
    }
}
