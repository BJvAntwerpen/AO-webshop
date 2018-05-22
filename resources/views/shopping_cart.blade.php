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
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <ul>
                                    <li>This is a product name.</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>This is its description and stuffz.</li>
                                </ul>
                            </div>
                            <div class="col-md-2">
                            	This is the count.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection