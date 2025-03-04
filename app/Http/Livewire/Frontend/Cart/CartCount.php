<?php 

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $cartCount = 0; // Default to 0

    // Ensure the listeners are defined as $listeners (plural)
    protected $listeners = ['CartAddedUpdated' => 'checkCartCount'];

    public function checkCartCount()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Update the cart count
            $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        } else {
            // If user is not authenticated, cart count should be 0
            $this->cartCount = 0;
        }
    }

    public function render()
    {
        // Ensure the cart count is updated
        $this->checkCartCount();

        return view('livewire.frontend.cart.cart-count', [
            'cartCount' => $this->cartCount
        ]);
    }
}
