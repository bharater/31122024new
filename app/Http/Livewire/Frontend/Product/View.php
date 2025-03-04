<?php
namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $quantityCount = 1;
    public $selectedVariations = [];
    public $selectedVariationPrice;
    public $selectedVariationImage;
    public $currentVariation;
    public $currentCombination;

    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Product already added to wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product already added to wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');

                session()->flash('message', 'Added to Wishlist Successfully');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to Wishlist Successfully',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            session()->flash('message', 'Please login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if (!Auth::check()) {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to add to cart',
                'type' => 'info',
                'status' => 401
            ]);
            return;
        }

        // Check if variation is selected when product has variations
        if ($this->product->variations->count() > 0 && empty($this->currentCombination)) {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please select product variation',
                'type' => 'info',
                'status' => 404
            ]);
            return;
        }

        // Check if the variation exists and has enough quantity
        if ($this->currentCombination) {
            if ($this->currentCombination->quantity < $this->quantityCount) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Only ' . $this->currentCombination->quantity . ' quantity available',
                    'type' => 'warning',
                    'status' => 404
                ]);
                return;
            }

            // Check if the variation is already in cart
            if (Cart::where('user_id', auth()->user()->id)
                ->where('product_id', $productId)
                ->where('variation_id', $this->currentCombination->id)
                ->exists()) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product already added to cart',
                    'type' => 'warning',
                    'status' => 200
                ]);
                return;
            }

            // Add variation to cart
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $productId,
                'variation_id' => $this->currentCombination->id,
                'quantity' => $this->quantityCount
            ]);
        } else {
            // Handle non-variation product
            if ($this->product->quantity < $this->quantityCount) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Only ' . $this->product->quantity . ' quantity available',
                    'type' => 'warning',
                    'status' => 404
                ]);
                return;
            }

            if (Cart::where('user_id', auth()->user()->id)
                ->where('product_id', $productId)
                ->whereNull('variation_id')
                ->exists()) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product already added to cart',
                    'type' => 'warning',
                    'status' => 200
                ]);
                return;
            }

            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $productId,
                'quantity' => $this->quantityCount
            ]);
        }

        $this->emit('CartAddedUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Product added to cart',
            'type' => 'success',
            'status' => 200
        ]);
    }

    public function selectVariation($attribute, $value)
    {
        $this->selectedVariations[$attribute] = $value;
        $this->updateSelectedCombination();
    }

    protected function updateSelectedCombination()
    {
        if (empty($this->selectedVariations)) {
            $this->currentVariation = null;
            $this->currentCombination = null;
            $this->selectedVariationPrice = null;
            $this->selectedVariationImage = null;
            return;
        }

        // Build combination string from selected variations
        $combinationParts = [];
        foreach ($this->selectedVariations as $attribute => $value) {
            $combinationParts[] = "$attribute:$value";
        }
        sort($combinationParts); // Ensure consistent order
        $combinationString = implode('|', $combinationParts);

        // Find matching combination
        $combination = $this->product->variationCombinations()
            ->where('combination_string', 'like', '%' . $combinationString . '%')
            ->first();

        if ($combination) {
            $this->currentCombination = $combination;
            $this->currentVariation = $combination;  // Set currentVariation to the combination
            $this->selectedVariationPrice = $combination->price;
            $this->selectedVariationImage = asset($combination->image);
            $this->emit('updateExzoom');
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
        $this->currentVariation = null;  // Initialize currentVariation
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
