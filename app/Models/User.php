<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    static $rules = [
        'name' => 'required',
		'email' => 'required',
        'password' => 'required',
        'location' => 'required',
        'about_you' => 'required',
    ];
   

    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'profile_photo_path',
        'banner_photo_path',
        'about_you'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // public function isAdmin() {
    //     $user = Model_has_role::where(['role_id', '=', User::get('id')],['model_id', '= 1']);
    //     if ($user === null) {
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }

    public function review()
    {
        return $this->hasMany('App\Models\Review', 'id_user', 'id');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment', 'id_user', 'id');
    }

    public function like()
    {
        return $this->hasMany('App\Models\Like', 'id_user', 'id');
    }
}
