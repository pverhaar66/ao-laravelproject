@extends('layouts.app')
@section('content')

<section id='mainsquare'>	
	<h1>we just need a shipping address</h1>
	<p>*this address will be bound to your account*</p>
	<ul>
		<li>
			<form action="" method="post">
				@crfs
				<p>Address: <input type="text" name="address" required></p>
				<p>ZIP: <input type="text" name="zip" required></p>
				<p>Province: <input type="text" name="province" required></p>
				<input type="submit" value="SubmiT">
			</form>
		</li>
	</ul>
</section>
@endsection	