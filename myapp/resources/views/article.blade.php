@extends('layouts.app')
@extends('layouts.sidemenu')

@section('content')

<section id='mainsquare'>	
	<form action="{{action('ShoppingcartController@addToCart')}}" method="post">
		{{csrf_field()}}
		<td><p>Name: {!! $article->article_name !!}	</p></td>
		<td><p>Description: {!! $article->article_description !!}</p>	</td>
		<td><p>Price: {!! $article->article_price !!}	</p></td>
		<td><input type="number" id="amount" min="1" max="999" value="1"  name="amount"></td>
		<td><input type="hidden" value="{{$article->article_id}}" name="article_id"></td>
		<td><input type="submit" value="Add to Cart"></td>
	</form>
</section>
@endsection