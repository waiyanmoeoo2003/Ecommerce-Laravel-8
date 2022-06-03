<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id','subtotal','dicount','tax','total','firstname','lastname','mobile','email','line1','line2','city','province','country','zipcode','status','is_shipping_different'
    ];
    public function user(){
        return $this->belongsto(User::class);
    }
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
    public function shipping(){
        return $this->hasOne(Shipping::class);
    }
    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
}
