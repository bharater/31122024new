<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'variation_id', // Add this if not already present
        'quantity'
    ];

  /**
 * Get the user that owns the Cart
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function product(): BelongsTo
{
    return $this->belongsTo(Product::class, 'product_id', 'id');
}

public function variationCombination(): BelongsTo
{
    return $this->belongsTo(VariationCombination::class, 'variation_id', 'id');
}

}
