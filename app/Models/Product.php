<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    // each product has category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    // each product in many invoices
    public function orderdetails(): HasMany
    {
        return $this->hasMany(OrderDetails::class);
    }
    // each product has many reviews
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
