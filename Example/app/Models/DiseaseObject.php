<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseObject extends Model
{
    use HasFactory;
    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

    public function object()
    {
        return $this->belongsTo(Objects::class);
    }
}
