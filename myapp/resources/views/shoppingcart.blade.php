@extends('layouts.app')
@section('content')
<section id='shoppingcartbody'>
	<section id='sidebar'>
		<a href="{{url('/home/')  }}" >Home</a>
	</section>
	<h1>Shoppingcart</h1>

	@if($shoppingcart !== null)
	@foreach($shoppingcart as $item)
	<form action="{{action('ShoppingcartController@updateItem')}}" method="post">
		{{csrf_field()}}
		<div id="productBox">
			<td><p>{!!$item->getProductOnPosition(0)->article_name!!}</p><td>
			<td><input type="number" min="1" max="999" id="amount" value="{!!$item->getAmount()!!}" name="amount"></td>
			<td><input type="hidden" id="article_id" value="{!!$item->getProductOnPosition(0)->article_id!!}" name="article_id"></td>
			<td><p id="price">p.p. €{!!$item->getProductOnPosition(0)->article_price!!}.00</p></td>
			<input type="submit" value="Update">
			<button id="removeItem" class="btn btn-default alert"><a href="{{url('/shoppingcart/delete/'. $item->getProductOnPosition(0)->article_id)  }}">Remove Item</a></button>
		</div>
	</form>
	@endforeach
	<p> Total Price : {!!$total!!}</p>
	<button><a href="{{url('/order/confirmation')}}">Order</a></button>
	<button><a href="{{url('shoppingcart/deletecart')}}">Empty cart</a></button>
	@else
	<p>Your cart is EMPTY</p>
	@endif
</section>	
@endsection