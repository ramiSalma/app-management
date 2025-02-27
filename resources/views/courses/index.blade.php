@extends('layout')
@section('content')
<h1 class="text-cyan-500 text-3xl text-center my-4">TP QUERY BUILDER</h1>
<ul>
    @foreach ($more_twenty as $item)
    <li class="text-white">{{ $item->name }} , {{$item->age}}</li>
    @endforeach
</ul>
<h3 class="text-pink-500">order by name</h3>
<ul>
    @foreach ($order_by_name as $item)
    <li class="text-white">{{ $item->name }} </li>
    @endforeach
</ul>
{{--  <h3 class="text-2xl text-cyan-500">{{$total}}</h3>  --}}
@endsection