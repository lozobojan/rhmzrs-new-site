<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bioprognosis extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'bio_prognoses';
}
