@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row justify-content-center">
                        <div class="col-md-10">Your orders</div>
                        <div class="col-md-2"><a href="{{url('/category')}}">Go back</a></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                    @if (!empty($orders))
                    <div class="row justify-content-center">
                        <div class="col-md-2">Order number</div>
                        <div class="col-md-4">View Order</div>
                        <div class="col-md-4">Ordered at</div>
                        <div class="col-md-2">Order status</div>
                    </div>
                    @foreach ($orders as $order)
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            {{ $order->id }}
                        </div>
                        <div class="col-md-4"><a href="{{ url('/orderDetails/' . $order->id) }}">View order</a></div>
                        <div class="col-md-4">
                            {{ $order->created_at }}
                        </div>
                        <div class="col-md-2">{{ $order->order_status }}</div>
                    </div>
                    @endforeach
                    @else
                        <div class="row justify-content-center">
                        	<p>You have no orders</p>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection