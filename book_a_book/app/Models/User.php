<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'group',
    ];


    public function orders (){
        return $this->hasMany(Order::class);
    }

    public function orders_all (){
        return $this->hasMany(Order::withoutGlobalScope(ArchivedScope::class));
    }

    public function statu (){
        return $this->order()->belongsTo(Statu::class, 'statu_id');
    }


    public function GethasOrderAttribute()
    {
        return count($this->orders->where('statu_id', '!=', 1));

    }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
