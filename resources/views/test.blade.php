@extends('layouts.app')

@section('content')
<div class="container">
	<div class="jumbotron">
	<?php var_dump($check) ?>
	</div>
	<a href="{{ url('/') }}">Return home</a>
</div>
@endsection