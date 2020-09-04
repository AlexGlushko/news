@extends('layout')

@section('content')
<div class="d-none" hidden>
    {{ $categories =  CategoryController::getCategories() }}
</div>

<div class="control-btns">
    <a href="{{route('manager')}}" class="btn btn-success btn-sm">Manager</a>
</div>

<div class="row ">

    <form action="{{route('article.store')}}"  method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="title">Title</label>
                    <input class="form-control" name="title" id="title" type="text" placeholder="Title" >
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
                <div class="form-group col-md-12">
                    <label for="text">Text</label>
                    <textarea class="form-control" name="text" id="text" rows="6" type="text" placeholder="Text"></textarea>
                    @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div> 
@endsection