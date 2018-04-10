@extends('layouts.app')

@section('content')

<section id='mainsquare'>
	<pre>	
	@if  (is_array($articles))

	@foreach($articles as $articles)
	{!!$articles!!}
	@endforeach

	@else

	{!!$articles!!}

	@endif
	</pre>
	<a>Add to shopping cart</a>
</section>

<section id='sidebar'>
	
	<a href="{{url('/home/shoppingcart')  }}" >View Shopping Cart</a>
	
	<h2>Categoriën</h2>
	<a href="{{url('/home/')  }}" >Home</a>
	@foreach($categories  as $category)
		<a href="{{ url('/home/category/' .  $category->category_id) }}">{{$category->category_name}}</a>
	@endforeach
</section>
@endsection