@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row justify-content-center">
                        <div class="col-md-10">Order number {{ $orderDetails[0]->order_id }}</div>
                        <div class="col-md-2"><a href="{{url('/orders')}}">Go back</a></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <p>Product name</p>
                            </div>
                            <div class="col-md-2">
                                <p>Quantity</p>
                            </div>
                            <div class="col-md-2">Item cost</div>
                            <div class="col-md-3">Total cost</div>
                        </div>
                    </div>
                        @foreach ($orderDetails as $orderDetail)
                            <div class="row justify-content-center">
                                @foreach ($products as $product)
                                    @if ($product->id == $orderDetail->product_id)
                                        <div class="col-md-5">
                                            {{ $product->product_name }}
                                        </div>
                                        <div class="col-md-2 count">
                                            {{ $orderDetail->product_count }}
                                        </div>
                                        <div class="col-md-2">
                                            &euro;{{ $product->product_price }}
                                        </div>
                                        <div class="col-md-3 totalPrice">
                                            &euro;{{ $product->product_price * $orderDetail->product_count }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                        <div class="row justify-content-center">
                            <div class="col-md-2">Totals:</div>
                            <div class="col-md-3">Total item count</div>
                            <div class="col-md-2" id="totalItems"></div>
                            <div class="col-md-2">Total price</div>
                            <div class="col-md-2" id="totalPrice">&euro;</div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection