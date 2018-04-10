

<section id='sidebar'>

	<a href="{{url('/shoppingcart/')  }}" >View Shopping Cart</a>

	<h2>Categoriën</h2>
	<a href="{{url('/home/')  }}" >Home</a>
	@foreach($categories  as $category)
	<a href="{{ url('/home/' .  $category->category_id) }}">{{$category->category_name}}</a>
	@endforeach
</section>
