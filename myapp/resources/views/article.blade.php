@extends('layouts.app')
@section('content')

<section id='mainsquare'>	
	<pre>
	<a href="javascript:history.back()">Back</a>
	<p>Name: </p>{!! $article[0]->article_name !!}	
	<p>Description: </p>{!! $article[0]->article_description !!}	
	<p>Price: </p>{!! $article[0]->article_price !!}	
	<input  id="amount" min="1" max="999" value="1" type="number">
	<button id="addToCart"><a href="{{ url('/shoppingcart/add/' .  $article[0]->article_id) }}">Add to shopping cart</a></button>
</section>
@endsection