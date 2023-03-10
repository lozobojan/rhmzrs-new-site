<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FloodDefensePoint extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'flood_defense_points';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ordinal_number',
        'place',
        'river_basin_id',
        'ordinary_value',
        'extraordinary_value',
        'nnv',
        'kote0',
        'vvv',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function river_basin()
    {
        return $this->belongsTo(RiverBasin::class, 'river_basin_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
