@extends('layouts.app')
@section('content')
<section id='shoppingcartbody'>
	<section id='sidebar'>
		<a href="{{url('/home/')  }}" >Home</a>
	</section>
	<h1>Shoppingcart</h1>

	@if($shoppingcart !== null)
	@foreach($shoppingcart as $item)
	<div id="productBox">
		<p>{!!$item->getProductOnPosition(0)->article_name!!}</p> <input type="number" id="amount" value="{!!$item->getAmount()!!}" name="amount"></input>  <p id="price">€{!!$item->getProductOnPosition(0)->article_price!!}.00</p>
		<a href="{{ url('/shoppingcart/update/' .  $item->getProductOnPosition(0)->article_id) }}" >Update amount</a>
		<button id="removeItem" class="btn btn-default alert"><a href="{{url('/shoppingcart/delete/'. $item->getProductOnPosition(0)->article_id)  }}">Remove Item</a></button>
	</div>
	@endforeach
	<p> Total Price : {!!$total!!}</p>
	<button><a href="{{url('/order/confirmation')}}">Order</a></button>
	<button><a href="{{url('shoppingcart/deletecart')}}">Empty cart</a></button>
	@else
	<p>Your cart is EMPTY</p>
	@endif
</section>	
@endsection