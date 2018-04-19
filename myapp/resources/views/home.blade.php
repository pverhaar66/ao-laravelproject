@extends('layouts.app')
@extends('layouts.sidemenu')

@section('content')

<section id='mainsquare'>	
	
	@if  (is_array($articles))

	@foreach($articles as $article)	
	<a href="{{ url('/home/article/' .  $article[0]->article_id) }}" >{!!$article[0]->article_name!!}</a>  <input  id="amount" min="1" max="999" value="1" type="number"> <button id="addToCart"><a href="{{ url('/shoppingcart/add/' .  $article[0]->article_id) }}">Add to shopping cart</a></button>
	@endforeach
	
	@else
	{!!$articles!!}
	</pre>	
	@endif	
	
	
</section>
    <script type="text/javascript" src="{{ URL::asset('js/webshop.js') }}"></script>		
@endsection