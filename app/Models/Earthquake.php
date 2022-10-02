<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earthquake extends Model
{
    use HasFactory;
    protected $table = "earthquakes";

    protected $guarded = ['id'];
}
