<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
   protected $fillable = [
    'user_id', 'order_no', 'batch_no', 'core_brand', 'box_brand', 'end_tag', ''
   ];

   public function items()
   {
      return $this->hasMany(OrderItem::class);
   }
}
