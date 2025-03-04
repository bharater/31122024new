<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    public function index()
    {
        $variations = ProductVariation::all();
        return view('admin.variations.index', compact('variations'));
    }

    public function create()
    {
        return view('admin.variations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'variation_name' => 'required|string|max:255',
            'values' => 'required|array',
            'values.*' => 'required|string|max:255',
        ]);

        ProductVariation::create([
            'name' => $request->input('variation_name'),
            'values' => $request->input('values'),
            'status' => $request->has('status'),
        ]);

        return redirect()->route('variations.index')->with('message', 'Product variation created successfully.');
    }

    // In your VariationController.php

public function edit($variation_id)
{
    $productVariation = ProductVariation::findOrFail($variation_id);
    return view('admin.variations.edit', compact('productVariation'));
}

public function update(Request $request, $variation_id)
{
    $productVariation = ProductVariation::findOrFail($variation_id);
    // Your update logic here
    $productVariation->update([
        'name' => $request->input('variation_name'),
        'values' => $request->input('values'),
        'status' => $request->has('status'),
    ]);

    return redirect()->route('variations.index')->with('message', 'Variation updated successfully.');
}


    public function destroy(ProductVariation $productVariation)
    {
        $productVariation->delete();

        return redirect()->route('variations.index')->with('message', 'Product variation deleted successfully.');
    }
}
