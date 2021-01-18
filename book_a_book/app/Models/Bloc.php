<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
{
    use HasFactory;

    protected $fillable = [
        'bloc',
    ];

    public function books (){
        return $this->hasMany(Book::class); 
    }
}
