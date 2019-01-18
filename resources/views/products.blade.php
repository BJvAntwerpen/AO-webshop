@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($action == 'added')
            <div class="alert alert-success">success. Added {{$productName}} to the shopping cart</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row justify-content-center">
                        <div class="col-md-10">Products from category {{$category->category_name}}</div>
                        <div class="col-md-2"><a href="{{url('/category')}}">Go back</a></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach($products as $product)
                                <div class="col-md-4">
                                <ul>
                                <li><a href="{{ url('/product/' . $category->id . '/' . $product->id) }}">{{$product->product_name}}</a></li>
                                </ul>
                                </div>
                                <div class="col-md-2"><a href="{{ url('/addToCart?category_id=' . $category->id . '&product_id=' . $product->id . '&return=products') }}">add 1 to cart</a></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
