<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allmessage extends Model
{
    use HasFactory;
    protected $fillable = ['message','type'];
}
