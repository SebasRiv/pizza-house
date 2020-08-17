@extends('layouts.layout')

@section('content')
<div class="wraper pizza-details">
    <h1>Order for {{ $pizza->name }}</h1>
    <p class="type">Type is {{ $pizza->type }} </p>
    <p class="base">Base is {{ $pizza->base }}</p>
    <p class="toppings">Extra toppings:</p>
    <ul>
        @foreach($pizza->toppings as $topping)
        <li>{{ $topping }}</li>
        @endforeach
    </ul>
</div>
<a href="/pizzas" class="back"><- Back to all pizzas</a>
@endsection