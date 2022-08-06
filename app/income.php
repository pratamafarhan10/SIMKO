<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class income extends Model
{
    //
    use HasFactory;


    protected $fillable = [
        'deskripsi', 'jumlah_penjualan', 'pendapatan_bersih', 'user_id', 'status'

    ];
    protected $table = 'incomes';
}
