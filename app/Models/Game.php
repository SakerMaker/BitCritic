<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    static $rules = [
    ];

    protected $perPage = 20;

    protected $fillable = [];
}
