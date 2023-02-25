<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    static $rules = [
		'title' => 'required',
		'description' => 'required',
        'image' => 'mimes:jpeg,jpg,png|max:10240',
        'fecha_salida' => 'required',
        'genero' => 'required',
    ];

    protected $perPage = 4;

    protected $fillable = ['title','description','image','fecha_salida','genero'];

    public function review()
    {
        return $this->hasMany('App\Models\Review', 'id_game', 'id');
    }
}
