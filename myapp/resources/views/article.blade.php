@extends('layouts.app')
@section('content')

<section id='mainsquare'>	

	<a href="javascript:history.back()">Back</a>
	{!! $article !!}	
	<input  id="amount" min="1" max="999" value="1" type="number">
	<button id="addToCart"><a href="{{ url('/shoppingcart/add/' .  $article[0]->article_id) }}">Add to shopping cart</a></button>
</section>
@endsection