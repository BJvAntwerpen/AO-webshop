@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
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
								<input type="number" name="quantity" min="1" max="10" value="1"><br>
								add to cart
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection