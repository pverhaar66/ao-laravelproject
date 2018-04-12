@extends('layouts.app')
@extends('layouts.sidemenu')

@section('content')

<section id='mainsquare'>	
	<pre>	
	@if  (is_array($articles))

	@foreach($articles as $article)	
	{!!$article!!}
	<button id="addToCart"><a href="{{ url('/shoppingcart/add/' .  $article[0]->article_id) }}">Add to shopping cart</a></button>
	@endforeach

	@else
	{!!$articles!!}
	</pre>	
	@endif		
</section>
    <script type="text/javascript" src="{{ URL::asset('js/webshop.js') }}"></script>		
@endsection