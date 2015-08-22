@extends('app')

@section('header')
	<h1>Team ("</h1>
@stop

@section('content')
	<h2>this is our game called '{{ $stuff['Game_Name'] }}' and stuff</h2>
	<h3>and by 'our' we mean:
	<ul>
	@forelse ($stuff['Authors'] as $author)
		<li>{{$author}}</li>
	@empty
		<li>NOBODY OMG NO ONE</li>
	@endforelse

	</ul>
	</h3>
	<p>I'm actually just making sure routing works and being waay too verbose</p>
	<p>aaand that was Truck's lesson in 'oh yeah this is how css works' for today</p>
@stop

@section('footer')
	<h6>this is totally taking too much time go code something</h6>
@stop
