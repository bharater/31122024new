<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Variation;
use App\Models\VariationCombination;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductVariation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        // Fetch all product variations
        $VariationValues = ProductVariation::select('values')->get();
        $variations = ProductVariation::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands', 'variations', 'VariationValues'));
    }

    public function store(ProductFormRequest $request)
    {
        // Validate the main product data
        $validatedData = $request->validated();

        // Validate variations' quantities separately
        if ($request->has('select_variation')) {
            foreach ($request->select_variation as $key => $variationId) {
                if (isset($request->quantity[$key])) {
                    if (!is_numeric($request->quantity[$key])) {
                        return back()->withErrors(['quantity' => 'Each variation must have a valid numeric quantity.'])->withInput();
                    }
                }
            }
        }

        // Proceed with database transaction
        DB::transaction(function () use ($validatedData, $request) {
            $category = Category::findOrFail($validatedData['category_id']);

            // Create the product
            $product = $category->products()->create([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => (int) $validatedData['quantity'],
                'trending' => $request->has('trending') ? 1 : 0,
                'featured' => $request->has('featured') ? 1 : 0,
                'status' => $request->has('status') ? 1 : 0,
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';
                $i = 1;

                foreach ($request->file('image') as $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extension;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }

            // Handle variations and combinations
            if ($request->has('combinations')) {
                $variationImageIndex = 0; // Keep track of the image index globally

                // Get all combinations data
                $combinations = $request->input('combinations', []);
                $prices = $request->input('price', []);
                $quantities = $request->input('quantity', []);
                $variationImages = $request->file('variation_image', []);

                // Process each combination
                foreach ($combinations as $index => $combinationString) {
                    // Handle image for this specific combination
                    $combinationImage = null;
                    if (isset($variationImages[$index]) && $variationImages[$index]->isValid()) {
                        $file = $variationImages[$index];
                        $ext = $file->getClientOriginalExtension();
                        $filename = time() . '_comb_' . $index . '.' . $ext;

                        $uploadPath = 'uploads/products/variations/combinations/';
                        if (!File::exists($uploadPath)) {
                            File::makeDirectory($uploadPath, 0755, true);
                        }

                        $file->move(public_path($uploadPath), $filename);
                        $combinationImage = $uploadPath . $filename;
                    }

                    // Create combination record with its specific data
                    VariationCombination::create([
                        'product_id' => $product->id,
                        'combination_string' => $combinationString,
                        'price' => $prices[$index] ?? 0,
                        'quantity' => $quantities[$index] ?? 0,
                        'image' => $combinationImage
                    ]);
                }
            }
        });

        return redirect('admin/products')->with('message', 'Product Added Successfully');
    }

    public function edit(int $product_id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $variations = ProductVariation::all()->map(function($variation) {
            $variation->values = is_string($variation->values) ? json_decode($variation->values) : $variation->values;
            return $variation;
        });
        $product = Product::with(['variationCombinations'])->findOrFail($product_id);

        return view('admin.products.edit', compact('categories', 'brands', 'product', 'variations'));
    }

    public function update(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();

        DB::transaction(function () use ($validatedData, $request, $product_id) {
            $product = Product::findOrFail($product_id);
            $product->update($validatedData);

            // Handle variations update
            if ($request->has('variations')) {
                foreach ($request->variations as $key => $variationData) {
                    $variation = VariationCombination::find($key);

                    if ($variation) {
                        // Update existing variation
                        $variation->price = $variationData['price'];
                        $variation->quantity = $variationData['quantity'];

                        // Handle variation image update
                        if (isset($request->file('variations')[$key]['image'])) {
                            $file = $request->file('variations')[$key]['image'];
                            $ext = $file->getClientOriginalExtension();
                            $filename = time() . '_var_' . $key . '.' . $ext;

                            $uploadPath = 'uploads/products/variations/';
                            if (!File::exists($uploadPath)) {
                                File::makeDirectory($uploadPath, 0755, true);
                            }

                            // Delete old image if exists
                            if ($variation->image && File::exists($variation->image)) {
                                File::delete($variation->image);
                            }

                            $file->move(public_path($uploadPath), $filename);
                            $variation->image = $uploadPath . $filename;
                        }

                        $variation->save();
                    }
                }
            }
        });

        return redirect('admin/products')->with('message', 'Product Updated Successfully');
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }

        $productImage->delete();
        return redirect()->back()->with('message', 'Product Image Deleted');
    }

    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);

        DB::transaction(function () use ($product) {
            if ($product->productImages) {
                foreach ($product->productImages as $image) {
                    if (File::exists($image->image)) {
                        File::delete($image->image);
                    }
                }
            }
            $product->delete();
        });

        return redirect()->back()->with('message', 'Product Deleted With All Its Records');
    }

    public function deleteVariation($variation_id)
    {
        $variation = Variation::findOrFail($variation_id);

        if ($variation->image && File::exists($variation->image)) {
            File::delete($variation->image);
        }

        $variation->delete();

        return response()->json(['message' => 'Variation deleted successfully']);
    }
}
