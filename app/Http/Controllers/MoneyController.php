<?php

namespace App\Http\Controllers;

use Auth;
use App\money;
use App\member;
use App\month;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user_id = auth()->user()->id;
        $divisi = auth()->user()->divisi;
        $moneys = Money::where([['month_id', '=', $id], ['user_id', '=', $user_id]])->orderBy('status_dept', 'desc')->get();
        $approved = Money::where([['month_id', '=', $id], ['user_id', '=', $user_id], ['status_dept', '=', 'Approved']])->count();
        $notapproved = Money::where([['month_id', '=', $id], ['user_id', '=', $user_id]])->count();
        $members = member::where('user_id', '=', $user_id)->get();
        if (isEmpty($members)) {
            $progress = 0;
        } elseif (!isEmpty($members)) {
            $progress = ($approved / $notapproved) * 100;
        }
        $month = Month::where('id', '=', $id)->first();
        $kategori_id = auth()->user()->kategori_id;

        if ($kategori_id == 1) {
            return view('bendaharainti.kas.uangkas', compact('moneys', 'month', 'progress', 'divisi', 'members'));
        } elseif ($kategori_id == 2) {
            return view('bendaharabiro.kas.uangkas', compact('moneys', 'month', 'progress', 'divisi', 'members'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $user_id = auth()->user()->id;
        $moneys = Money::where('month_id', '=', $id)->orderBy('status_dept', 'asc')->get();
        $month = Month::where('id', '=', $id)->first();
        $kategori_id = auth()->user()->kategori_id;

        $members = member::where('user_id', '=', $user_id)->get();
        $approved = Money::where([['month_id', '=', $id], ['status_inti', '=', 'Approved']])->count();
        $notapproved = Money::where('month_id', '=', $id)->count();
        if (isEmpty($members)) {
            $progress = 0;
        } elseif (!isEmpty($members)) {
            $progress = ($approved / $notapproved) * 100;
        }

        if ($kategori_id == 1) {
            return view('bendaharainti.kas.approved', compact('moneys', 'month', 'progress'));
        }
    }

    public function editapproved(Money $money)
    {
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return view('Bendaharainti/kas/editapproved', compact('money'));
        }
    }

    public function updateapproved(Request $request, money $money)
    {
        $request->validate([
            'status_inti' => 'required',
        ]);

        Money::where('id', $money->id)
            ->update([
                'status_inti' => $request->status_inti,
            ]);


        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return redirect('/approvekas/' . $money->month_id);
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
     * @param  \App\money  $money
     * @return \Illuminate\Http\Response
     */
    public function show(money $money)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\money  $money
     * @return \Illuminate\Http\Response
     */
    public function edit(money $money)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\money  $money
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, money $money)
    {
        $request->validate([
            'jumlah' => 'required',
            'status_dept' => 'required',
            'tanggal_bayar' => 'required'
        ]);

        // dd($request);
        Money::where('id', $money->id)
            ->update([
                'jumlah' => $request->jumlah,
                'status_dept' => $request->status_dept,
                'tanggal_bayar' => $request->tanggal_bayar,
            ]);


        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return redirect('/kasinti/' . $money->month_id);
        } elseif ($kategori_id == 2) {
            return redirect('/kasbiro/' . $money->month_id);
        }
    }


    public function updateIndex(Money $money)
    {
        //     $money = Money::find($i);
        // return view('/Bendaharabiro/edituangkas', compact('money'));

        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return view('/Bendaharainti/kas/edituangkas', compact('money'));
        } elseif ($kategori_id == 2) {
            return view('/Bendaharabiro/kas/edituangkas', compact('money'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\money  $money
     * @return \Illuminate\Http\Response
     */
    public function destroy(money $money)
    {
        //
    }
}
