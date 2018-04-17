@extends('layouts.app')

@section('content')
<section id='shoppingcartbody'>
	<section id='sidebar'>
		<a href="{{url('/home/')  }}" >Home</a>
	</section>
	<h1>Shoppingcart</h1>

	@if($shoppingcart !== null)
	
	@foreach($shoppingcart as $item)
	<p>{!!$item->getProductOnPosition(0)->article_name!!}</p>  <input type="number" value="{!!$item->getAmount()!!}" name="amount"></input>  <p>€{!!$item->getProductOnPosition(0)->article_price!!}.00</p>
	@endforeach
	
	@else
	<p>The cart is EMPTY</p>
	@endif

</section>
@endsection