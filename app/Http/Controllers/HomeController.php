<?php

namespace App\Http\Controllers;

use Auth;
use App\money;
use App\month;
use App\income;
use App\expense;
use App\member;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DashboardExport;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if(auth()->user()->kategori_id==1){
        //     $home = 'Bendaharainti';
        // }
        // else{
        //     $home = 'Bendaharabiro';
        // }

        $kategori_id = auth()->user()->kategori_id;
        $nama = auth()->user()->fullname;
        $userid = auth()->user()->id;
        $divisi = auth()->user()->divisi;
        date_default_timezone_set('asia/jakarta');
        $date = date('l, d/m/Y', time());
        $date2 = date('h:i A', time());
        $user_id = auth()->user()->id;

        $bb = time();
        $hour = date("G", $bb);
        if ($hour > 3 && $hour < 10) {
            $sapa =  "Selamat pagi";
        } elseif ($hour > 10 && $hour < 15) {
            $sapa =  "Selamat siang";
        } elseif ($hour > 15 && $hour < 18) {
            $sapa =  "Selamat sore";
        } else {
            $sapa =  "Selamat malam";
        }

        if ($kategori_id == 1) {
            $money = money::sum('moneys.jumlah');
            $income = income::sum('incomes.pendapatan_bersih');
            $expense = expense::sum('expenses.jumlah_pengeluaran');
            $totalpendapatan = $money + $income;
            $totaluang = $totalpendapatan - $expense;
            return view('bendaharainti/homepage', compact('money', 'income', 'expense', 'totalpendapatan', 'totaluang'));
        } elseif ($kategori_id == 2) {

            $money = money::where('user_id', '=', $userid)->sum('moneys.jumlah');
            $blmbayar = money::where([['user_id', '=', $userid], ['status_dept', '=', 'not approved']])->count();
            $anggota = member::where('user_id', '=', $userid)->count();
            $random = rand(1,12);
            $notapproved = Money::where([['month_id', '=', $random], ['user_id', '=', $user_id], ['status_dept', '=', 'Not approved']])->count();
            $month = Month::where('id', '=', $random)->first();
            return view('bendaharabiro/homepage', compact('money', 'divisi', 'anggota', 'blmbayar', 'date', 'date2', 'sapa', 'nama', 'month', 'notapproved'));
        }

        // return view($home.'.homepage');
    }
    public function export()
    {
        // Excel::create('Laporan Keuangan')->download('xls');
        return Excel::download(new DashboardExport, 'LaporanKeuangan.xlsx');
    }
}
//a
