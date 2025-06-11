<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class OrderItem extends Model
{
    protected $fillable = [
        'user_id', 'order_id', 'size', 'meter', 'micron', 'color', 'qty', 'rate'
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
