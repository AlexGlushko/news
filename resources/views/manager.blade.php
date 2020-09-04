@extends('layout')

@section('content')
<div class="control-btns">
    <a href="{{route('add')}}" class="btn btn-success btn-sm">Add new Article</a>
</div>
<div class="control-btns">
    <a href="{{route('manager')}}" class="btn btn-secondary btn-sm">Go home</a>
</div>


<table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
@foreach ($articles as $article)

    <tbody>
        <tr>
            <th scope="row"><a href="{{route('show', $article->id)}}">{{ $article->title }}</a> </th>
            <td><b>{{$article->category}}</b> </td>
            <td><a class="btn btn-warning btn-sm" href="{{route('article.edit',[$article->id])}}">Edit</a></td>
            <td>
                <form action="{{route('article.delete',[$article->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>               
                </form>
            </td>
        </tr>
                
    </tbody>
              
@endforeach
</table>
<div class=" mt-8">{{ $articles->links() }}</div>

@endsection