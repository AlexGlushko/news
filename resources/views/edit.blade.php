@extends('layout')
@section('content')

<div class="d-none" hidden>
    {{ $categories =  CategoryController::getCategories() }}
</div>


  


    <form action="{{route('article.update',['id' =>$article->id])}}"  method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">


                <div class="form-group col-md-6">
                    <label for="title">Title</label>
                    <input class="form-control" name="title" id="title" type="text" placeholder="Title" value="{{old('title', $article->title)}}">
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
         

                <div class="form-group col-md-6">
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{$category->category}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="text">Text</label>
                    <textarea class="form-control" name="text" id="text" rows="6" type="text" placeholder="Text" value="">{{old('text', $article->text)}}</textarea>
                    @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>


    
@endsection
