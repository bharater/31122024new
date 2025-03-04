<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VariationCombination extends Model
{
    use HasFactory;

    protected $table = 'variation_combinations';
    protected $fillable = [
        'product_id',
        'combination_string',
        'price',
        'quantity',
        'image'
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}