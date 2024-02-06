@extends('layout')

@section('content')
<h2>New Book</h2>

<form action="{{route('books.update')}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $book->id }}">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control invalid " name="title" value="{{old('title', $book->title)}}">
        <div class = "feedback">
            {{ $errors->first('title') }}
        </div>
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" value="{{old('author', $book->author )}}">
        <div class = "feedback">
            {{ $errors->first('author') }}
        </div>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" value="{{old('price', $book->price )}}">
        <div class = "feedback">
            {{ $errors->first('price') }}
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-danger" href="{{ route('books.index') }}">Cancel</a>
</form>


@endsection