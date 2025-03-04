<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\VariationCombination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orderitem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'product_color_id',
        'variation_id', // Add variation_id to fillable
        'quantity',
        'price'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function productColor(): BelongsTo
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id', 'id');
    }

    public function variationCombination(): BelongsTo
    {
        return $this->belongsTo(VariationCombination::class, 'variation_id', 'id');
    }
}
