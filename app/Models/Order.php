<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
   protected $fillable = [
      'assigned_to_product_manager', 'assigned_to_dispatch_manager',
    'user_id', 'order_no', 'batch_no', 'core_brand', 'box_brand', 'end_tag', ''
   ];

   public function items()
   {
      return $this->hasMany(OrderItem::class);
   }
}
