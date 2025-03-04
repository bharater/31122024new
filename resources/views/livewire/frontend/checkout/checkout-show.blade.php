<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>

            @if ($this->totalProductAmount != '0')
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary mb-3">Order Items</h4>
                        <hr>
                        <!-- Add Order Items Display -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Variations</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($carts as $cartItem)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($cartItem->product->productImages->count() > 0)
                                                        <img src="{{ asset($cartItem->product->productImages[0]->image) }}"
                                                             style="width: 50px; height: 50px"
                                                             class="me-2" alt="">
                                                    @endif
                                                    <span>{{ $cartItem->product->name }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                @if($cartItem->variation_id)
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
                                                @else
                                                    <span class="text-muted">No variations</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($cartItem->variation_id && $variation)
                                                    ${{ $variation->price }}
                                                @else
                                                    ${{ $cartItem->product->selling_price }}
                                                @endif
                                            </td>
                                            <td>{{ $cartItem->quantity }}</td>
                                            <td>
                                                @php
                                                    $price = $cartItem->variation_id && $variation
                                                        ? $variation->price
                                                        : $cartItem->product->selling_price;
                                                    $itemTotal = $price * $cartItem->quantity;
                                                @endphp
                                                ${{ $itemTotal }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <h4 class="text-primary mt-3">
                            Total Amount :
                            <span class="float-end">${{$this->totalProductAmount}}</span>
                        </h4>
                        <hr>
                        <small>* Items will be delivered in 3 - 5 days.</small>
                        <br/>
                        <small>* Tax and other charges are included ?</small>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Basic Information
                        </h4>
                        <hr>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Full Name</label>
                                    <input type="text" wire:model.defer="fullname" class="form-control" placeholder="Enter Full Name" />
                                    @error('fullname')<small class="text-danger">{{$message}}</small> @enderror

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone Number</label>
                                    <input type="number" wire:model.defer="phone" class="form-control" placeholder="Enter Phone Number" />
                                    @error('phone')<small class="text-danger">{{$message}}</small> @enderror

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email Address</label>
                                    <input type="email" wire:model.defer="email" class="form-control" placeholder="Enter Email Address" />
                                    @error('email')<small class="text-danger">{{$message}}</small> @enderror

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pin-code (Zip-code)</label>
                                    <input type="number" wire:model.defer="pincode" class="form-control" placeholder="Enter Pin-code" />
                                    @error('pincode')<small class="text-danger">{{$message}}</small> @enderror

                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Full Address</label>
                                    <textarea wire:model.defer="address" class="form-control" rows="2"></textarea>
                                    @error('address')<small class="text-danger">{{$message}}</small> @enderror

                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Select Payment Mode: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button wire:loading.attr="disabled" class="nav-link active fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>
                                            <button wire:loading.attr="disabled" class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
                                        </div>
                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                            <div class="tab-pane fade active show"  id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6>Cash on Delivery Mode</h6>
                                                <hr/>
                                                <button type="button" wire:loading.attr="disabled" wire:loading.attr="disabled"  wire:click="codOrder"; class="btn btn-primary">

                                                    <span wire:loading.remove wire:target = "codOrder">
                                                        Place Order (Cash on Delivery)
                                                    </span>

                                                    <span wire:loading wire:target = "codOrder">
                                                        Placeing Order
                                                    </span>
                                                </button>

                                            </div>
                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Online Payment Mode</h6>
                                                <hr/>
                                                <button type="button" class="btn btn-warning">Pay Now (Online Payment)</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>
                </div>

            </div>
            @else
            <div class="card card-boy shadow text-center p-md-5">
                <h4>no item in cart to checkout</h4>
                <a href="{{url('collections')}}" class="btn  btn-warning">Shop Now</a>
                 </div>
            @endif


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
    .table > :not(caption) > * > * {
        vertical-align: middle;
    }
</style>
@endpush
