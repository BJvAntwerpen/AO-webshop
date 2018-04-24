@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products from category X</div>
                {{$products}}
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="{{ url('/product') }}">Product 1</a></li>
                                    <li><a href="{{ url('/product') }}">Product 2</a></li>
                                    <li><a href="{{ url('/product') }}">Product 3</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="{{ url('/product') }}">Product 4</a></li>
                                    <li><a href="{{ url('/product') }}">Product 5</a></li>
                                    <li><a href="{{ url('/product') }}">Product 6</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{$productCategory}}
            </div>
        </div>
    </div>
</div>
@endsection
