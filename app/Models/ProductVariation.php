<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'values', 'status'];

    protected $casts = [
        'values' => 'array'
    ];

    // No need for a values relationship since we're storing values as JSON
}
