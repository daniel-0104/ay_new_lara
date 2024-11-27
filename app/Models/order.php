<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = ['user_name','order_code','total_price','status'];

    public function orderDetails()
    {
        return $this->hasMany(orders_details::class);
    }
}
