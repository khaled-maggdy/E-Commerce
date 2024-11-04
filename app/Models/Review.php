<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory,SoftDeletes;
// each review made by one user
    public function user () : BelongsTo {
       return $this->belongsTo(User::class);
       
    }
    // each review has one product (review on product)
    public function product () : BelongsTo {
       return $this->belongsTo(Product::class);
       
    }

}
