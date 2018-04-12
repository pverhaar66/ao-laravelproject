@extends('layouts.app')

@section('content')
<section id='shoppingcartbody'>
	<section id='sidebar'>
		<a href="{{url('/home/')  }}" >Home</a>
	</section>
	<h1>Shoppingcart</h1>

	@if($shoppingcart !== null)
	
	@foreach($shoppingcart as $item)
	<p>{!!$item!!}</p>
	@endforeach
	
	@else
	<p>The cart is EMPTY</p>
	@endif

</section>
@endsection