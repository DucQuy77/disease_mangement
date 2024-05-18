<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objects extends Model
{
    protected $table = 'objects';

    protected $fillable = ['object_name', 'pictures'];

    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'disease_object', 'object_id', 'disease_id');
    }
    use HasFactory;
}
