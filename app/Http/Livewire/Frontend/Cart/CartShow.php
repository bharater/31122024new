<?php
namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        if (Auth::check()) {
            $this->cart = Cart::where('user_id', Auth::id())->get();
        } else {
            $this->cart = collect(); // Empty collection if user is not authenticated
        }
    }

    public function updateQuantity(int $cartId, string $action)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', Auth::id())->first();

        if (!$cartData) {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 404
            ]);
            return;
        }

        $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();

        // Handle quantity updates for products with colors
        if ($productColor) {
            $availableQuantity = $productColor->quantity;
        } else {
            // Handle for non-color products
            $availableQuantity = $cartData->product->quantity;
        }

        if ($action === 'increment') {
            if ($availableQuantity > $cartData->quantity) {
                $cartData->increment('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Only ' . $availableQuantity . ' quantity available',
                    'type' => 'warning',
                    'status' => 200
                ]);
            }
        } elseif ($action === 'decrement') {
            if ($cartData->quantity > 1) {
                $cartData->decrement('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Minimum quantity is 1',
                    'type' => 'warning',
                    'status' => 200
                ]);
            }
        }
    }

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', Auth::id())->where('id', $cartId)->first();

        if ($cartRemoveData) {
            $cartRemoveData->delete();
            $this->loadCart(); // Reload cart after deletion
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart item removed successfully',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function render()
    {
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}
