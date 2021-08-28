<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model
{
    use HasFactory;


    protected $table = 'book_order';


    public function order (){
        return $this->belongsTo(Order::class, 'order_id');
    }

}
