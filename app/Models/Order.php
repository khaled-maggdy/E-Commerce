<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
   use HasFactory, SoftDeletes;
   // order ordered by user but user can order many orders
   public function user(): BelongsTo
   {
      return $this->belongsTo(User::class);
   }
   // each order in one invoice
   public function orderdetails(): BelongsTo
   {
      return $this->belongsTo(OrderDetails::class);
   }
   // order had paied once
   public function payment(): BelongsTo
   {
      return $this->belongsTo(Payment::class);
   }
   // order can shipped once
   public function ship(): BelongsTo
   {
      return $this->belongsTo(Shipping::class);
   }
}
