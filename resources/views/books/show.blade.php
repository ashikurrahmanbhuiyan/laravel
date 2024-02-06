@extends('layout')

@section('content')

<h1>Bookstore</h1>
<table class="table table-striped table-bordered">
        <tr>
            <th>Id</th>
            <td>{{ $book->id }}</td>
        </tr>
        <tr>
            <th>Title</th> 
            <td>{{ $book->title }}</td>
        </tr>
        <tr>
            <th>Author</th>  
            <td>{{ $book->author }}</td>
        </tr>
        <tr>
            <th>Price</th>  
            <td>{{ $book->price }}</td>
        </tr>
</table>
<a class="btn btn-primary"  href=" {{ route( 'books.edit', $book->id ) }}">edit</a>
<a class="btn btn-success" href="{{ route ('books.index') }}"> Back to list </a>

@endsection