@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product categories</div>

                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="{{ url('/products') }}">Category 1</a></li>
                                    <li><a href="{{ url('/products') }}">Category 2</a></li>
                                    <li><a href="{{ url('/products') }}">Category 3</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="{{ url('/products') }}">Category 4</a></li>
                                    <li><a href="{{ url('/products') }}">Category 5</a></li>
                                    <li><a href="{{ url('/products') }}">Category 6</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
