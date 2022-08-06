<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class month extends Model
{
    //
    use HasFactory;
    protected $fillable = ["id", "month_name"];
    protected $table = 'months';
}
