<?php
namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variation extends Model
{
    use HasFactory;

    protected $table = 'variations';
    protected $fillable = [
        'product_id',
        'attribute',
        'value',
        'price',
        'quantity',
        'image',
        'use_for_price',
        'use_for_image'
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
