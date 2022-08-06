<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $fillable = ["fullname", "nim", "divisi", "angkatan", "user_id"];



    protected $table = 'members';
}
