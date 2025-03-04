<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Orderitem;
use Illuminate\Support\Str;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;

class CheckoutShow extends Component
{
    public $carts , $totalProductAmount = 0;
    public $fullname, $email, $phone , $pincode , $address , $payment_mode = NULL ,$payment_id = NULL;

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
                'user_id' => auth()->user()->id,
                'tracking_no'=> 'funda-'.Str::random(10),
                'fullname'=>$this->fullname,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'pincode'=>$this->pincode,
                'address'=>$this->address,
                'status_message'=>"in progress",
                'payment_mode'=>$this->payment_mode,
                'payment_id'=>$this->payment_id,
            ]);

            foreach($this->carts as $cartItem)
            {

            $orderItems = Orderitem::create([
                'order_id'=>$order->id,
                'product_id'=>$cartItem->product_id,
                'product_color_id'=>$cartItem->product_color_id,
                'variation_id' => $cartItem->variation_id, // Include variation_id
                'quantity'=>$cartItem->quantity,
                'price'=>$cartItem->variation_id ? $cartItem->variationCombination->price : $cartItem->product->selling_price
                    ]);
                    if($cartItem->product_color_id != NULL)
                    {
                        $cartItem->productColor()->where('id',$cartItem->product_color_id)->decrement('quantity',$cartItem->quantity);
                    }
                    else
                    {
                        $cartItem->product()->where('id',$cartItem->product_id)->decrement('quantity',$cartItem->quantity);

                    }

              }

   return $order;
            }

    public function codOrder()
    {
        // $validatedData = $this->validate();
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();

        if($codOrder)
        {
            Cart::where('user_id',auth()->user()->id)->delete();

            try{
                $order=Order::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
                // Mail sent Successfully
            }
            catch(\Exception $e)
            {
                //something Went Wrong
            }

            session()->flash('message','Order placed successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order placed successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went Wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }


    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach($this->carts as $cartItem)
        {
            if ($cartItem->variation_id) {
                $variation = $cartItem->product->variationCombinations()
                    ->where('id', $cartItem->variation_id)
                    ->first();
                $price = $variation ? $variation->price : $cartItem->product->selling_price;
            } else {
                $price = $cartItem->product->selling_price;
            }
            $this->totalProductAmount += $price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }

    public function mount()
    {
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->phone = auth()->user()->userDetail->phone;
        $this->pincode = auth()->user()->userDetail->pin_code;
        $this->address = auth()->user()->userDetail->address;

        $this->totalProductAmount = $this->totalProductAmount();

        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount,
            'cart' => $this->carts // Pass the cart data to the view
        ]);
    }
}
