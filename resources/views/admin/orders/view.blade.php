@extends('layouts.admin')

@section('title', 'My Order Details')

@section('content')
<div class="row">

    <div class="col-md-12">

        @if (session('message'))
            <div class="alert alert-success mb-3">{{session('message')}}</div>
        @endif
        <div class="card border mt-3">
            <div class="card-header">
                <h3>My Order Details </h3>
            </div>
            <div class="card-body">

                    <h3 class="text-primary">
                        <i class="fa fa-shopping-cart text-dark"></i> My Order Details

                        <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end mx-1">
                            <span class="fa fa-arrow-left"></span> Back
                        </a>
                        <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm float-end mx-1">
                            <span class="fa fa-download"></span> Download Invoice
                        </a>
                        <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-sm float-end mx-1">
                            <span class="fa fa-eye"></span> View Invoice
                        </a>
                        <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}"  class="btn btn-info btn-sm float-end mx-1">
                            <span class="fa fa-eye"></span> Send Invoice Via Mail
                        </a>

                    </h3>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order ID: {{ $order->id }}</h6>
                            <h6>Tracking ID/No: {{ $order->tracking_no }}</h6>
                            <h6>Ordered Date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                            <h6>Order Mode: {{ $order->payment_mode }}</h6>
                            <h6 class="border p-2 text-success">Order Status Message:
                                <span class="text-uppercase">{{ $order->status_message }}</span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name: {{ $order->fullname }}</h6>
                            <h6>Email ID: {{ $order->email }}</h6>
                            <h6>Phone: {{ $order->phone }}</h6>
                            <h6>Address: {{ $order->address }}</h6>
                            <h6>Pincode: {{ $order->pincode }}</h6>
                        </div>
                    </div>

                    <br>
                    <h5>Order Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Variations</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp

                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td width="10%">{{ $orderItem->id }}</td>
                                        <td width="10%">
                                            @if ($orderItem->product && $orderItem->product->productImages)
                                                <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                     style="width: 50px; height: 50px" alt="Product Image">
                                            @else
                                                <img src="{{ asset('assets/images/no-image.png') }}"
                                                     style="width: 50px; height: 50px" alt="Default Image">
                                            @endif
                                        </td>
                                        <td>{{ $orderItem->product->name ?? 'Product Not Found' }}</td>
                                        <td>
                                            @if($orderItem->variationCombination)
                                                <div class="variation-details">
                                                    @php
                                                        $parts = explode('|', $orderItem->variationCombination->combination_string);
                                                        foreach($parts as $part) {
                                                            list($attr, $val) = explode(':', $part);
                                                            echo "<span class='badge bg-info me-1'>$attr: $val</span>";
                                                        }
                                                    @endphp
                                                </div>
                                            @else
                                                <span class="text-muted">No variations</span>
                                            @endif
                                        </td>
                                        <td width="10%">
                                            @if($orderItem->variationCombination)
                                                ${{ $orderItem->variationCombination->price }}
                                            @else
                                                ${{ $orderItem->price }}
                                            @endif
                                        </td>
                                        <td width="10%">{{ $orderItem->quantity }}</td>
                                        <td width="10%" class="fw-bold">
                                            @php
                                                $price = $orderItem->variationCombination
                                                    ? $orderItem->variationCombination->price
                                                    : $orderItem->price;
                                                $itemTotal = $price * $orderItem->quantity;
                                                $totalPrice += $itemTotal;
                                            @endphp
                                            ${{ $itemTotal }}
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6" class="fw-bold">Total Amount</td>
                                    <td colspan="1" class="fw-bold">${{ $totalPrice }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4>Order Process (Order Status Updates)</h4>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{url('admin/orders/'.$order->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <label>Update Your Order Status</label>
                            <div class="input-group">
                                <select name="order_status" class="form-select mt-2 text-black">
                                    <option value="">Select Order Status</option>
                                    <option value="in progress"  {{Request::get('status')== 'in progress' ?'selected':''}}>In Progress</option>
                                    <option value="completed"  {{Request::get('status')== 'completed' ?'selected':''}}>Completed</option>
                                    <option value="pending"  {{Request::get('status')== 'pending' ?'selected':''}}>Pending</option>
                                    <option value="cancelled"  {{Request::get('status')== 'cancelled' ?'selected':''}}>Cancelled</option>
                                    <option value="out-for-delivery"  {{Request::get('status')== 'out-for-delivery' ?'selected':''}}>Out For Delivery</option>
                                </select>
                                <button class ="btn btn-primary text-white mt-2 " type="submit">Update</button>
                            </div>

                         </form>

                    </div>

                    <div class="col-md-7">
                        <br/>
                        <h4 class="mt-3">Current Order Status: <span class="text-uppercase">{{$order->status_message}}</span></h4>
                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
@endsection

@push('styles')
<style>
    .variation-details {
        margin: 4px 0;
    }
    .variation-details .badge {
        font-weight: normal;
        font-size: 0.85em;
    }
</style>
@endpush
