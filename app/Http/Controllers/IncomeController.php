<?php

namespace App\Http\Controllers;

use App\income;
use App\member;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori_id = auth()->user()->kategori_id;
        $divisi = auth()->user()->divisi;
        $user_id = auth()->user()->id;
        $incomes = income::all();
        $pendapatan = income::where('user_id', '=', $user_id)->get();
        if ($kategori_id == 1) {
            $income = income::sum('incomes.pendapatan_bersih');
            return view('bendaharainti.pendapatan.PendapatanLainI', compact('incomes','income', 'divisi'));
        } elseif ($kategori_id == 2) {
            $members = member::where('user_id', '=', $user_id)->get();
            $income = income::where('user_id', '=', $user_id)->sum('incomes.pendapatan_bersih');
            return view('bendaharabiro.pendapatan.PendapatanLain', compact('incomes', 'income','divisi', 'pendapatan'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'jumlah_penjualan' => 'required',
            'pendapatan_bersih' => 'required',

        ]);
        $user_id = auth()->user()->id;
        // dd($request);

        $insert = income::create([
            'user_id' => $user_id,
            'deskripsi' => $request->deskripsi,
            'jumlah_penjualan' => $request->jumlah_penjualan,
            'pendapatan_bersih' => $request->pendapatan_bersih,
            'status' => 'Not Approved'
        ]);

        session()->flash('success', 'Pendapatan berhasil ditambahkan');
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return redirect('/pendapataninti');
        } elseif ($kategori_id == 2) {
            return redirect('/pendapatanbiro');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {



        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            $request->validate([
                'status' => 'required'
            ]);

            Income::where('id', $income->id)
                ->update([
                    'status' => $request->status,
                ]);
            session()->flash('success', 'Pendapatan berhasil diperbarui');   
            return redirect('/pendapataninti');
        } elseif ($kategori_id == 2) {
            $request->validate([
                'deskripsi' => 'required',
                'jumlah_penjualan' => 'required',
                'pendapatan_bersih' => 'required'
            ]);

            Income::where('id', $income->id)
                ->update([
                    'deskripsi' => $request->deskripsi,
                    'jumlah_penjualan' => $request->jumlah_penjualan,
                    'pendapatan_bersih' => $request->pendapatan_bersih,
                ]);
            session()->flash('success', 'Pendapatan berhasil diperbarui');
            return redirect('/pendapatanbiro');
        }
    }


    public function updateIndex(Income $income)
    {

        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return view('Bendaharainti/pendapatan/editpendapatan', compact('income'));
        } elseif ($kategori_id == 2) {
            return view('Bendaharabiro/pendapatan/editpendapatan', compact('income'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(income $income)
    {

        income::destroy($income->id);

        session()->flash('success', 'Pendapatan berhasil dihapus');
        return redirect('/pendapatanbiro');
    }
}
