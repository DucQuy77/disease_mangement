<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $table = 'likes';
    protected $fillable = ['user_id', 'disease_id'];

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
    public function user()
    {
        return $this->belongsTo(Account::class);
    }
}

