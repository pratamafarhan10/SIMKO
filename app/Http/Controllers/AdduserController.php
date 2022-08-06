<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Money;
use App\Income;
use App\Expense;
use App\Member;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdduserController extends Controller
{

    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'kategori_id' => 'required',
            'password' => 'required',
            'nim' => 'required',
            'divisi' => 'required'
        ]);
        // dd($request);
        $insert = user::create([
            // 'id' => $id,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'kategori_id' => $request->kategori_id,
            'password' => Hash::make($request->password),
            'nim' => $request->nim,
            'divisi' => $request->divisi,
        ]);
        session()->flash('success', 'User berhasil ditambah');
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return redirect('/listuser');
        }
    }

    public function index()
    {
        $kategori_id = auth()->user()->kategori_id;

        if ($kategori_id == 1) {
            $user_inti = auth()->user()->id;
            $users = user::get();

            return view('Bendaharainti.user.listuser', compact('users'));
        }
    }

    public function destroy(user $user)
    {
        expense::where('user_id', '=', $user->id)->delete();
        income::where('user_id', '=', $user->id)->delete();
        money::where('user_id', '=', $user->id)->delete();
        member::where('user_id', '=', $user->id)->delete();
        user::destroy($user->id);
        session()->flash('success', 'User berhasil dihapus');
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return redirect('/listuser');
        }
    }

    public function edit(user $user)
    {
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return view('bendaharainti/user/edituser', compact('user'));
        }
        else{
            return view('/');
        }
    }

    public function update(Request $request, user $user)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'kategori_id' => 'required',
            'password' => 'required',
            'nim' => 'required',
            'divisi' => 'required'
        ]);

        user::where('id', $user->id)
            ->update([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'kategori_id' => $request->kategori_id,
                'password' => Hash::make($request->password),
                'nim' => $request->nim,
                'divisi' => $request->divisi,
            ]);

        session()->flash('success', 'User berhasil diupdate');
        $kategori_id = auth()->user()->kategori_id;
        if ($kategori_id == 1) {
            return redirect('/listuser');
        }
    }
}
