<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
