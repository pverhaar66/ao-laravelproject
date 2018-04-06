@extends('layouts.app')

@section('content')

<section id='mainsquare'>
	{!! $article !!}
	<a>Add to shopping cart</a>
</section>

<section id='sidebar'>
	<a href="{{url('/home/shoppingcart')  }}" >Check Shopping Cart</a>
	<h2>Categoriën</h2>
	<a href="{{url('/home')  }}" >Home</a>
	<a href="{{url('/home/1')  }}" >Beeld & Geluid</a>
	<a href="{{url('/home/2')  }}">Computer</a>
	<a href="{{url('/home/3')  }}">Foto & video</a>
	<a href="{{url('/home/4')  }}">Gaming</a>
	<a href="{{url('/home/5')  }}">Muziek</a>
</section>
@endsection