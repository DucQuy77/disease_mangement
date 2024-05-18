<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseSeason extends Model
{
    use HasFactory;

    protected $table = 'disease_season';
    protected $fillable = [
        'disease_id',
        'season_id'
    ];
    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

}
