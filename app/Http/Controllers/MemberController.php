<?php

namespace App\Http\Controllers;

use Auth;
use App\member;
use Illuminate\Http\Request;
use App\money;

class MemberController extends Controller
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

        if ($kategori_id == 1) {
            $user_inti = auth()->user()->id;
            $members = member::where('user_id', '=', $user_inti)->get();
            $jumlah = member::where('user_id', '=', $user_inti)->count();
            return view('Bendaharainti.anggota.anggota', compact('members', 'divisi', 'jumlah'));
        } elseif ($kategori_id == 2) {
            $user_biro = auth()->user()->id;
            $members = member::where('user_id', '=', $user_biro)->get();
            $jumlah = member::where('user_id', '=', $user_biro)->count();
            return view('Bendaharabiro.anggota.anggota', compact('members', 'divisi', 'jumlah'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'fullname' => 'required',
            'nim' => 'required',
            'angkatan' => 'required',
            'divisi' => 'required',
        ]);
        $user_id = auth()->user()->id;
        // dd($request);
        // $insert = member::create($request->all());
        $insert = member::create([
            'user_id' => $user_id,
            'fullname' => $request->fullname,
            'nim' => $request->nim,
            'divisi' => $request->divisi,
            'angkatan' => $request->angkatan,
        ]);
        // $member = member::insertgetid($last);
        // dd($insert->id);
        // sleep(1);
        for ($i = 1; $i < 13; $i++) {
            money::create([
                'user_id' => $user_id,
                'member_id' => $insert->id,
                'month_id' => $i,
                'fullname' => $request->fullname,
                'nim' => $request->nim,
                'angkatan' => $request->angkatan,
                'divisi' => $request->divisi,
                'jumlah' => 0,
                'status_dept' => "Not approved",
                'status_inti' => "Not approved",
            ]);
        }



        session()->flash('success', 'Anggota berhasil ditambahkan');
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return redirect('anggotainti');
        } elseif ($kategori_id == 2) {
            return redirect('anggotabiro');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(member $member)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(member $member)
    {
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return view('bendaharainti/anggota/editanggotainti', compact('member'));
        } elseif ($kategori_id == 2) {
            return view('bendaharabiro/anggota/editanggotabiro', compact('member'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, member $member)
    {
        $request->validate([
            'fullname' => 'required',
            'nim' => 'required',
            'angkatan' => 'required',
            'divisi' => 'required',
        ]);

        member::where('id', $member->id)
            ->update([
                'fullname' => $request->fullname,
                'nim' => $request->nim,
                'angkatan' => $request->angkatan,
                'divisi' => $request->divisi,
            ]);
        money::where('member_id', $member->id)
            ->update([
                'fullname' => $request->fullname,
                'nim' => $request->nim,
                'angkatan' => $request->angkatan,
                'divisi' => $request->divisi,
            ]);

        session()->flash('success', 'Anggota berhasil diupdate');
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return redirect('anggotainti');
        } elseif ($kategori_id == 2) {
            return redirect('anggotabiro');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(member $member)
    {
        money::where('member_id', '=', $member->id)->delete();
        member::destroy($member->id);

        session()->flash('success', 'Anggota berhasil dihapus');
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return redirect('anggotainti');
        } elseif ($kategori_id == 2) {
            return redirect('anggotabiro');
        }
    }
}
