@extends('layouts.app')
@section('content')

<section id='mainsquare'>	
	<a href="{{url('/home/')  }}"><button>Back</button></a>
	@foreach($orders as $order)
	<p id="orderlist">
	{{$order->order_id}}
		@foreach($orderdetails as $orderdetail)
			@if ($orderdetail->order_id === $order->order_id)
				@foreach($articles as $article)
					@if ($orderdetail->article_id === $article->article_id)
					- <a href="{{ url('/home/article/' .  $article->article_id) }}">{{$article->article_name}}</a>
					@endif
				@endforeach
			@endif
		@endforeach
	</p>
	@endforeach
	
</section>
@endsection