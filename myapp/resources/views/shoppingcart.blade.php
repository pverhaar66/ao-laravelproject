@extends('layouts.app')
@section('content')
<section id='shoppingcartbody'>
	<section id='sidebar'>
		<a href="{{url('/home/')  }}" >Home</a>
	</section>
	<h1>Shoppingcart</h1>

	@if($shoppingcart !== null)
	@foreach($shoppingcart as $item)
	<p>{!!$item->getProductOnPosition(0)->article_name!!}</p> <input type="number" id="amount" value="{!!$item->getAmount()!!}" name="amount"></input>  <p id="price">€{!!$item->getProductOnPosition(0)->article_price!!}.00</p>
	<button id="removeItem" class="btn btn-default alert"><a href="{{url('/shoppingcart/delete/'. $item->getProductOnPosition(0)->article_id)  }}">Remove Item</a></button>
	@endforeach
	<p> Total Price : {!!$total!!}
	<button><a href="{{url('/order/confirmation')}}">Order</a></button>
	@else
	<p>The cart is EMPTY</p>
	@endif
	
	

</section>
<script type="text/javascript" src="{{ URL::asset('js/webshop.js') }}"></script>	
@endsection