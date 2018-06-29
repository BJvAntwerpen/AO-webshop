@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row justify-content-center">
                        <div class="col-md-10">Your shopping cart</div>
                        <div class="col-md-2"><a href="{{url('/category')}}">Go back</a></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                    	@if (!empty($cart))
                    	<div class="row justify-content-center">
                            <div class="col-md-2">
                            	<p>Product name</p>
                            </div>
                            <div class="col-md-3">
                                <p>Product description</p>
                            </div>
                            <div class="col-md-2">
                            	<p>Quantity</p>
                            </div>
                            <div class="col-md-2">Item cost</div>
                            <div class="col-md-2">Total cost</div>
                            <div class="col-md-1">Del</div>
                        </div>
                    	@foreach ($cart as $product)
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                            	<p>{{ $product['product_name'] }}</p>
                            </div>
                            <div class="col-md-3">
                                <p>{{ $product['product_desc'] }}</p>
                            </div>
                            <div class="col-md-2">
                            	<form>
                            		<input class="{{ 'id' . $product['product_id'] }}" type="number" name="quantity" min="0" max="999999" value="{{ $product['quantity'] }}">
                            	</form>
                            </div>
                            <div class="col-md-2">&euro;{{ $product['product_price'] }}</div>
                            <div class="col-md-2 totalPrice">&euro;{{ $product['product_price'] * $product['quantity'] }}</div>
                            <div class="col-md-1"><a class="btn btn-link" href="{{ url('/deleteItem?product_id=' . $product['product_id']) }}">X</a></div>
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
                        <div class="row justify-content-center">
                        	<div class="col-md-2"></div>
                        	<div class="col-md-5"><a class="btn btn-link" href="{{url('/testClient')}}">Order</a></div>
                        	<div class="col-md-2"><a class="btn btn-link" href="{{url('/clear')}}">Clear cart</a></div>
                        	<div class="col-md-2"></div>
                        	<div class="col-md-1"></div>
						</div>
                        @else
                        <div class="row justify-content-center">
                        	<p>Your cart is empty</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection