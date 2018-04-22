@extends('layouts.app')
@section('content')

<section id='mainsquare'>	
	<h1>THANKYOU FOR YOUR ORDER </h1>
	<a href="{{url('/home/')  }}" >Home</a>
	@foreach($orderlist as $order)
	<div id="productRow">
		<p>Name : {!!$order->getProductOnPosition(0)->article_name!!}</p>
		<p>Amount : {!!$order->getAmount()!!}</p>
		<p>Price : {!!$order->getProductOnPosition(0)->article_price!!}</p>
	</div>
	@endforeach
	<div id="totalPrice">
		<p>shipping: €0,99</p>
		<p>total price :	</p>
	</div>
</section>
@endsection