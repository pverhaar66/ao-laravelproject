@extends('layouts.app')
@extends('layouts.sidemenu')

@section('content')

<section id='mainsquare'>	
	
	@if  (is_array($articles))
	
	@foreach($articles as $article)	
	<div class="productBox">
	<a href="{{ url('/home/article/' .  $article[0]->article_id) }}" >{!!$article[0]->article_name!!}</a> 
	<p>€{!!$article[0]->article_price!!}.00</p> <input  id="amount" min="1" max="999" value="1" type="number"> 
	<button id="addToCart"><a href="{{ url('/shoppingcart/add/' .  $article[0]->article_id) }}">Add to shopping cart</a></button>
	</div>
	@endforeach
	
	@else
	{!!$articles!!}
	</pre>	
	@endif	
	
	
</section>
@endsection