<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $kategori_id = auth()->user()->kategori_id;
        $userid = auth()->user()->id;
        $user = user::where('id', '=', $userid)->first();

        if ($kategori_id == 1) {
            return view('bendaharainti/user/profil', compact('user'));
        } elseif ($kategori_id == 2) {
            return view('bendaharabiro/user/profil', compact('user'));
        }
        
    }
}
