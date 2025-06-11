<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = [
    'order_no', 'batch_no', 'core_brand', 'box_brand', 'end_tag', ''
   ];
}
