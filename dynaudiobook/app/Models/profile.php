<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table = 'profile';

    protected $fillable = [
        'age',
        'address',
        'user_id',
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
