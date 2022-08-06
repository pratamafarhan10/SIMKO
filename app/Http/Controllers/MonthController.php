<?php

namespace App\Http\Controllers;

use App\month;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $months = Month::all();
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return view('Bendaharainti.kas.bulanuangkas', compact('months'));
        } elseif ($kategori_id == 2) {
            return view('Bendaharabiro.kas.bulanuangkas', compact('months'));
        }
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexapprove()
    {
        //
        $months = Month::all();
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return view('Bendaharainti.kas.bulanapprove', compact('months'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\month  $month
     * @return \Illuminate\Http\Response
     */
    public function show(month $month)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\month  $month
     * @return \Illuminate\Http\Response
     */
    public function edit(month $month)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\month  $month
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, month $month)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\month  $month
     * @return \Illuminate\Http\Response
     */
    public function destroy(month $month)
    {
        //
    }
}
