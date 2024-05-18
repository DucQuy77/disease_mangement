<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seasons extends Model
{
    protected $table = 'seasons';
    protected $fillable = ['season_name', 'pictures'];

    use HasFactory;
    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'disease_season', 'season_id', 'disease_id');
    }

}
