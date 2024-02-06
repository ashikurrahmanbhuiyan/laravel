@extends('layout')

@section('content')

<h1><a href="{{ route('books.index') }}">Book Store</a></h1>

<div class="row">
    <div class="col-lg-7">
        <form action="{{ route('books.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" value="{{ request()->get('search') }}" class="form-control" placeholder="Search" name="search" >
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
    </div>
    <div class="col-lg-3"></div>
    <div class="col-lg-2 ">
        <p class="text-right"><a href="{{ route('books.create') }}" class="btn btn-primary">New Book</a></p>
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th colspan="3" style="text-align: center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->price }}</td>
            <td> <a href=" {{ route( 'books.show', $book->id ) }}">view</a></td>
            <td> <a href=" {{ route( 'books.edit', $book->id ) }}">edit</a></td>
            <td> 
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Sure?')">
                    @csrf
                    <input type="hidden" name="id" value="{{ $book->id}}">
                    <input type="submit" value="delete" class="btn text-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $books->links() }}

@endsection