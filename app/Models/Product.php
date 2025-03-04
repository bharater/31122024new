<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Variation;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\VariationCombination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'featured',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function productImages(){

        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function variations()
    {
        return $this->hasMany(Variation::class);
    }

    public function variationCombinations()
    {
        return $this->hasMany(VariationCombination::class);
    }

}
