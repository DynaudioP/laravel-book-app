<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['title', 'summary', 'image', 'stok', 'genre_id']; 

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
