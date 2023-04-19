<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class EmployeeExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Employee::select('firstname','lastname','company_id','email','phone')->get();
    }

    public function map($row): array
    {
        return [
            $row->firstname,
            $row->lastname,
            $row->company_id,
            $row->email,
            $row->phone,
        ];
    }

    public function headings(): array
    {
        return ['firstname','lastname','company name','email','phone'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A1:C1:B1:D1:E1' => [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => 'center',
                ],
            ],
            'E' => [
                'width' => 30,
            ],
        ];
    }
}
