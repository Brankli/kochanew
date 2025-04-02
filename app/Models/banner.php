<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected $fillable = ['image'];

    use HasFactory;
    public function admin(): belongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
