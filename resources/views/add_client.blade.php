@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Please insert your address</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('ClientController@addClient') }}">
                        @csrf
                        <input type="text" name="address">
                        <input type="hidden" name="userId" value="{{ $userId }}">
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection