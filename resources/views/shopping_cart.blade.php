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
                            <div class="col-md-4">
                            	<p>Product name</p>
                            </div>
                            <div class="col-md-6">
                                <p>Product description</p>
                            </div>
                            <div class="col-md-2">
                            	<p>Quantity</p>
                            </div>
                        </div>
                    	@foreach ($cart as $product)
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                            	<p>{{$product['product_name']}}</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{$product['product_desc']}}</p>
                            </div>
                            <div class="col-md-2">
                            	<p>{{$product['quantity']}}</p>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="row justify-content-center">
                        	<p>Your cart is empty</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <a href="{{url('/clear')}}">Clear cart</a>
        </div>
    </div>
</div>
@endsection