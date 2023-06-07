<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'title' , 'price' , 'description' , 'qty' , 'slug'
    ];

    public function gallery():HasMany{
        return $this->hasMany(ProductGallery::class , 'product_id' , 'id');
    }

    public function carts():HasMany{
        return $this->hasMany(Carts::class , 'product_id' , 'id');
    }

    public function transaction_items():BelongsTo{
        return $this->belongsTo(TransactionItems::class , 'id' , 'produk_id');
    }

}
