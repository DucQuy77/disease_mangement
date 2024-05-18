<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['user_id', 'disease_id', 'content'];

    public function user()
    {
        return $this->belongsTo(Account::class);
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
}
