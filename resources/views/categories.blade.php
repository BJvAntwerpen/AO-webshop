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
                            @foreach ($categories as $category)
                            @if ($category->category_id % 2 != 0)
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="{{ url('/products/' . $category->category_id) }}">{{$category->category_name}}</a></li>
                                </ul>
                            </div>
                            @endif

                            @if ($category->category_id % 2 == 0)
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="{{ url('/products') }}">{{$category->category_name}}</a></li>
                                </ul>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
