@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			@if ($action == 'added')
            <div class="alert alert-success">success. Added {{$product->product_name}} to the cart {{$quantity}} times</div>
            @endif
			<div class="card">
				<div class="card-header">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-10">{{$product->product_name}}</div>
							<div class="col-md-2"><a href="{{url('/products/' . $category_id)}}">Go back</a></div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-8">
								{{$product->product_description}}
							</div>
							<div class="col-md-2">
								{{$product->product_price}}
							</div>
							<div class="col-md-2">
								<form method="get" action="{{ action('ShoppingCartController@addToCart') }}">
								<input type="number" name="quantity" min="1" max="100" value="1"><br>
								<input type="submit" value="Add to cart">
								<input type="hidden" name="category_id" value="{{ $category_id }}">
								<input type="hidden" name="product_id" value="{{ $product->id }}">
								<input type="hidden" name="return" value="product">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection