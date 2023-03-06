<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    static $rules = [
        'id_game' => 'required',
		'id_user' => 'required',
        'title' => 'required',
        'content' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['id_game','id_user','title','content'];

    public function game()
    {
        return $this->belongsTo('App\Models\Game', 'id', 'id_game');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'id_user');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment', 'id_review', 'id');
    }
}
