<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    static $rules = [
        'id_user' => 'required',
		'id_comment' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['id_user','id_comment'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function comment()
    {
        return $this->hasOne('App\Models\Comment', 'id', 'id_comment');
    }
    
}
