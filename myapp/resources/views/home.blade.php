@extends('layouts.app')
@extends('layouts.sidemenu')

@section('content')

<section id='mainsquare'>	
	<pre>	
	@if  (is_array($articles))

	@foreach($articles as $article)	
	{!!$article!!}
	<a href="{{$shoppingcart->addToCart($article)}}">Add to shopping cart</a>
	@endforeach

	@else
	{!!$articles!!}
	<a href="{{$shoppingcart->addToCart($articles)}}">Add to shopping cart</a>				
	</pre>	
	@endif		
</section>
		
@endsection