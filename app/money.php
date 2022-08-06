<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class money extends Model
{

    public $table = 'moneys';
    protected $fillable = ["fullname", "nim", "divisi", "month_id", "angkatan", "jumlah", "status_dept", "status_inti", "member_id","updated_at", "user_id", "tanggal_bayar"];
    public function member()
    {
        return $this->belongsTo('App\member', 'member_id');
    }
    // public function user()
    // {
    //     return $this->belongsTo('App\user', 'usersid');
    // }
    public function month()
    {
        return $this->belongsTo('App\month', 'month_id');
    }


    use HasFactory;
}
