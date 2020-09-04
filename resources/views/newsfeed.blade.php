@extends('layout')

@section('filter')   

<div class="container">
        <div class="row header-btns">
            <div class="col-md-10 ">
                    <form action="/filter" method="get" class="mx-4">
                        <select name="filter" id="filter" >
                            @foreach ($categories as $category)
                            <option  value="{{$category->category}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                    <button class="btn btn-primary btn-sm" type="submit">Filter</button> <a class="btn btn-secondary" href="{{route('index')}}">Clear</a>
                </form> 
            </div>
            <div class="col-md-2 ">
                <a class="btn btn-success btn-sm" href="{{route('manager')}}">Manager</a>
            </div>
        </div>
</div>   


@endsection

@section('content')

<div class="container">
    <div class="row">
        @foreach ($articles as $article)
            <div class="card-body mt-5 pt-5"> 
                <h4 class="card-title card-header">
                    <a href="{{route('show', $article->id)}}">{{ $article->title }}</a>
                </h4>
                <div class="card-subtitle ">
                
                    <div> <b>{{$article->category}}</b> </div> 
                    <div>Date: {{ date('d.m.Y', strtotime($article->created_at))}}</div>
                
                </div>
                <p class="card-text">{{$article->text}}</p>
                
                
            </div>
        @endforeach

        @if (Route::current()->getName() == 'index')
            {{ $articles->links() }}
        @endif
        
    </div>
</div>

@stop
