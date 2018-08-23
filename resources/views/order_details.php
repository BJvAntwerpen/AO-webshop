@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row justify-content-center">
                        <div class="col-md-10">Order number #</div>
                        <div class="col-md-2"><a href="{{url('/category')}}">Go back</a></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                        	<p>Your cart is empty</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection