<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = [
        'disease_name',
        'image',
        'overview',
        'learn_general',
        'symptom',
        'reason',
        'risk',
        'diagnose',
        'prevent',
        'user_id',
    ];
    public function seasons()
    {
        return $this->belongsToMany(Seasons::class, 'disease_season', 'disease_id', 'season_id');
    }

    public function objects()
    {
        return $this->belongsToMany(Objects::class, 'disease_object', 'disease_id', 'object_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
