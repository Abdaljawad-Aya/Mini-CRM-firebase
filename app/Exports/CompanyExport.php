<?php

namespace App\Exports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CompanyExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Company::select('name', 'email', 'website')->get();
    }

    // map() method defines an array of values to be returned for each row of data
    public function map($row): array
    {
        return [
            $row->name,
            $row->email,
            $row->website
        ];
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Website'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:C1' => [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => 'center',
                ],
            ],
            'C' => [
                'width' => 30,
            ],
        ];
    }
}
