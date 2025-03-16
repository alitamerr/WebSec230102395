<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'author', 
        'published_year',
        'user_id' // ✅ Also include `user_id` since it's being assigned automatically
    ];

    /**
     * Define relationship: A book belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
