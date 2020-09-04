@extends('layout')

@section('content')

<div class="control-btns">
    <a href="{{route('index')}}" class="btn btn-secondary btn-sm">Go home</a>
</div>

@foreach ($article as $item)
<h3> {{$item->title}}</h3>
<h6> {{$item->category}}</h6>
<p> {{$item->text}}</p>
   
    
@endforeach
@endsection