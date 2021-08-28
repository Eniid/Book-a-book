<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author	',
        'edition',
        'isbn',
        'stock',
        'teacher',
        'class',
        'link',
        'requierd',
    ];


    public function blocs (){
        return $this->belongsToMany(Bloc::class);
    }

    public function orders (){
        return $this->belongsToMany(Order::class);
    }



}
