<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\money;
use App\income;
use App\expense;

class DashboardExport implements FromCollection
{
    public function headings():array
    {
        return [
            'id',
            'user_id',
            'fullname',
            'nim',
            'divisi',
            'angkatan',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $money = money::sum('moneys.jumlah');
        $income = income::sum('incomes.pendapatan_bersih');
        $expense = expense::sum('expenses.jumlah_pengeluaran');
        $totalpendapatan = $money+$income;
        $dashboard = [
            ['', 'Pendapatan', 'pengeluaran'], 
            ['Uang kas', $money, ''], 
            ['Pendapatan lain', $income, ''],
            ['Pengeluaran', '', $expense],
            ['Total', $totalpendapatan, $expense],
        ];
        // dd($dashboard);
        return collect($dashboard);
    }
}
