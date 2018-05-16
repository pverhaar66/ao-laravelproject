@extends('layouts.app')
@extends('layouts.sidemenu')

@section('content')

<section id='mainsquare'>	

	@if  (is_array($articles))

	@foreach($articles as $article)	
	<form action="{{action('ShoppingcartController@addToCart')}}" method="post">
		{{csrf_field()}}
		<td><a href="{{ url('/home/article/' .  $article[0]->article_id) }}" >{!!$article[0]->article_name!!}</a></td>
		<td><p>€{!!$article[0]->article_price!!}.00</p> </td>
		<td><input type="number" id="amount" min="1" max="999" value="1" name="amount"> </td>
		<td><input type="hidden" value="{{$article[0]->article_id}}" name="article_id"></td>
		<input type="submit" value="Add to Cart">
	</form>
	@endforeach

	@else
	{!!$articles!!}
</pre>	
@endif	

</section>
@endsection