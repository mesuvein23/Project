<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='orders';

    protected $fillable=[
        'user_id',
        'fullname',
        'email',
        'phonenumber',
        'address',
        'city',
        'region',
        'total_price',
        'tracking_no',
    ];


    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
}
