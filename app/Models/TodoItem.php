<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoItem extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
