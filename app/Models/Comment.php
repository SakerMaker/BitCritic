<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    static $rules = [
        'id_user' => 'required',
		'id_review' => 'required',
        'content' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['id_user','id_review','content'];

    public function review()
    {
        return $this->hasOne('App\Models\Review', 'id', 'id_review');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function like()
    {
        return $this->hasMany('App\Models\Like', 'id_comment', 'id');
    }
}
