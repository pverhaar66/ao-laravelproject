@extends('layouts.app')
@section('content')

<section id='mainsquare'>	
	
	<a href="{{url('/home/')  }}"><button>Home</button></a>
	
	@foreach($orders as $order)
	<section id="orderlist">
			<p> order id : {{$order->id}}</p>
			<p> Name : {!!$client->client_name!!}</p>
			<p> Zipcode : {!!$client->client_zipcode!!}</p>
			<p> Address : {!!$client->client_address!!}</p>
			<p> Province/State : {!!$client->client_province_state!!}</p>
			<p>Status : {{$order->status}} @if($order->status == 'ordered')<button> <a href="{{ route('orderComfirmArrival', $order->id)}}">comfirm arival</a>@endif </button></p>
			
		@foreach($orderdetails as $orderdetail)
			@if ($orderdetail->order_id === $order->id)
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