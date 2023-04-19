<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompanyExport;

class ExportCompanyController extends Controller
{
    public function export()
    {
        return Excel::download(new CompanyExport, 'companies.xlsx');
    }
}
