@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                                @foreach($productCategories as $productCategory)
                                    @if($productCategory->product_id == $product->id)
                                        <div class="col-md-4">
                                        <ul>
                                        <li><a href="{{ url('/product/' . $category->id . '/' . $product->id) }}">{{$product->product_name}}</a></li>
                                        </ul>
                                        </div>
                                        <div class="col-md-2">add 1 to cart</div>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
