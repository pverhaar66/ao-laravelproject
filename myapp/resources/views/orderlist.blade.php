@extends('layouts.app')
@section('content')

<section id='mainsquare'>	
	
	<a href="{{url('/home/')  }}"><button>Back</button></a>
	
	@foreach($orders as $order)
	<section id="orderlist">
	{{$order->order_id}}
			<p> Name : {!!$client->client_name!!}</p>	<p> Zipcode : {!!$client->client_zipcode!!}</p>
			<p> Address : {!!$client->client_address!!}</p> 	<p> Province/State : {!!$client->client_province_state!!}</p>
			
		@foreach($orderdetails as $orderdetail)
			@if ($orderdetail->order_id === $order->order_id)
				@foreach($articles as $article)
					@if ($orderdetail->article_id === $article->article_id)
						<td><a href="{{ url('/home/article/' .  $article->article_id) }}">{{$article->article_name}}</a> x{{$orderdetail->amount }}</td>
					@endif
				@endforeach
			@endif
		@endforeach
	</section>
	@endforeach
	
</section>
@endsection