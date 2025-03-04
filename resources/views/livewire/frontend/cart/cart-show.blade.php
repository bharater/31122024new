<div>
    <div class="py-3 py-md-5">
        <div class="container">
            <h4>My Cart</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">
                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        @forelse ($cart as $cartItem)
                            @if($cartItem->product)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="{{url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug)}}">
                                            <label class="product-name">
                                                @if ($cartItem->product->productImages)
                                                    <img src="{{ asset($cartItem->product->productImages[0]->image) }}"
                                                         style="width: 50px; height: 50px" alt="">
                                                @else
                                                    <img src="" style="width: 50px; height: 50px" alt="">
                                                @endif

                                                {{$cartItem->product->name}}

                                                @if ($cartItem->variation_id)
                                                    @php
                                                        $variation = $cartItem->product->variationCombinations()
                                                            ->where('id', $cartItem->variation_id)
                                                            ->first();
                                                    @endphp
                                                    @if($variation)
                                                        <div class="variation-details">
                                                            @php
                                                                $parts = explode('|', $variation->combination_string);
                                                                foreach($parts as $part) {
                                                                    list($attr, $val) = explode(':', $part);
                                                                    echo "<span class='badge bg-secondary me-1'>$attr: $val</span>";
                                                                }
                                                            @endphp
                                                        </div>
                                                    @endif
                                                @endif
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-1 my-auto">
                                        <label class="price">
                                            @if ($cartItem->variation_id)
                                                @php
                                                    $variation = $cartItem->product->variationCombinations()
                                                        ->where('id', $cartItem->variation_id)
                                                        ->first();
                                                @endphp
                                                ${{ $variation ? $variation->price : $cartItem->product->selling_price }}
                                            @else
                                                ${{ $cartItem->product->selling_price }}
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <button type="button" wire:loading.attr="disabled"
                                                        wire:click="decrementQuantity({{$cartItem->id}})" class="btn btn1">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                                <input type="text" value="{{$cartItem->quantity}}" class="input-quantity" />
                                                <button type="button" wire:loading.attr="disabled"
                                                        wire:click="incrementQuantity({{$cartItem->id}})" class="btn btn1">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 my-auto">
                                        <label class="price">
                                            @php
                                                $price = $cartItem->variation_id
                                                    ? ($variation ? $variation->price : $cartItem->product->selling_price)
                                                    : $cartItem->product->selling_price;
                                                $total = $price * $cartItem->quantity;
                                                $totalPrice += $total;
                                            @endphp
                                            ${{ $total }}
                                        </label>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:loading.attr="disabled"
                                                    wire:click="removeCartItem({{$cartItem->id}})"
                                                    class="btn btn-danger btn-sm">
                                                <span wire:loading.remove wire:target="removeCartItem({{$cartItem->id}})">
                                                    <i class="fa fa-trash"></i> Remove
                                                </span>
                                                <span wire:loading wire:target="removeCartItem({{$cartItem->id}})">
                                                    <i class="fa fa-trash"></i> Removing...
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @empty
                            <div>No cart Items available</div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h4>Get the best deals and offers <a href="{{url('/collections')}}">Shop Now</a></h4>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h5>Total:
                            <span class="float-end">${{$totalPrice}}</span>
                        </h5>
                        <hr>
                        <a href="{{url('/checkout')}}" class="btn btn-warning" >Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .variation-details {
        margin-top: 5px;
        font-size: 0.9em;
    }
    .variation-details .badge {
        font-weight: normal;
    }
</style>
@endpush
