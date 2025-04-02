<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimonail extends Model
{
    use HasFactory;
    protected $fillable = ['Name', 'image','discribution'];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
