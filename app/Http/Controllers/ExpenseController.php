<?php

namespace App\Http\Controllers;

use Auth;
use App\expense;
use App\member;
use Illuminate\Http\Request;

class ExpenseController extends Controller
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

        $expenses = expense::all();

        if ($kategori_id == 1) {
            $user_inti = auth()->user()->id;
            $expense = expense::sum('expenses.jumlah_pengeluaran');
            $members = member::where('user_id', '=', $user_inti)->get();

            return view('bendaharainti.pengeluaran.pengeluaran', compact('expenses','expense', 'divisi'));
        } elseif ($kategori_id == 2) {
            $user_biro = auth()->user()->id;
            $expense = expense::sum('expenses.jumlah_pengeluaran');
            $members = member::where('user_id', '=', $user_biro)->get();

            return view('bendaharabiro.pengeluaran.pengeluaran', compact('expenses','expense', 'divisi'));
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
            'proker' => 'required',
            'jumlah_pengeluaran' => 'required',
            'tanggal_pengeluaran' => 'required'

        ]);
        $user_id = auth()->user()->id;
      
        // dd($request);

        $insert = expense::create([
            'user_id' => $user_id,
            'deskripsi' => $request->deskripsi,
            'proker' => $request->proker,
            'divisi' => $request->divisi,
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
        ]);

        session()->flash('success', 'Pengeluaran berhasil ditambahkan');
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return redirect('/pengeluaraninti');
        } elseif ($kategori_id == 2) {
            return redirect('/pengeluaran biro');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, expense $expense)
    {
        $kategori_id = auth()->user()->kategori_id;
      
        if ($kategori_id == 1) {
            $request->validate([
                'deskripsi' => 'required',
                'proker' => 'required',
                'divisi' => 'required',
                'jumlah_pengeluaran' => 'required',
                'tanggal_pengeluaran' => 'required'
            ]);
            $user_id = auth()->user()->id;
          
            Expense::where('id', $expense->id)
                ->update([
                    'user_id' => $user_id,
                    'deskripsi' => $request->deskripsi,
                    'proker' => $request->proker,
                    'divisi' => $request->divisi,
                    'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
                    'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
                ]);
                session()->flash('success', 'Pengeluaran berhasil diperbarui');
            return redirect('/pengeluaraninti');
        } elseif ($kategori_id == 2) {
           
            return redirect('/pengeluaranbiro');
        }
    }

    public function updateIndex(Expense $expense)
    {

        $kategori_id = auth()->user()->kategori_id;
        $divisi = auth()->user()->divisi;
        if ($kategori_id == 1) {
            return view('/Bendaharainti/pengeluaran/editpengeluaran', compact('expense', 'divisi'));
        } elseif ($kategori_id == 2) {
            return view('/Bendaharabiro/pengeluaran/editpengeluaran',  compact('expense', 'divisi'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(expense $expense)
    {
        expense::destroy($expense->id);

        session()->flash('success', 'Pengeluaran berhasil dihapus');
        return redirect('/pengeluaraninti');
    }
}
