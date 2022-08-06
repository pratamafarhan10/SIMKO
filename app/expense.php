<?php

namespace App;

use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    //
    use HasFactory;
    
    protected $table = 'expenses';

    protected $fillable = [
        'deskripsi', 'proker', 'divisi', 'jumlah_pengeluaran', 'tanggal_pengeluaran', 'user_id' 

    ];
}
