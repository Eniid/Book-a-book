<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ArchivedScope;

class Order extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',

    ];


    protected static function booted()
    {
        static::addGlobalScope(new ArchivedScope);
    }

    public function statu (){
        return $this->belongsTo(Statu::class, 'statu_id');
    }

    public function user (){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookOrders (){
        return $this->hasMany(BookOrder::class);
    }


    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

}
