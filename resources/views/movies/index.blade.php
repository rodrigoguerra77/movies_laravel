@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div> 
    @endif

    <a href="{{ url('movies/create') }}" class="btn btn-success">Add Movie</a>

    <br>
    <br>

    <table class="table table-light">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Year Published</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->name }}</td>
                    <td>{{ $movie->year_published }}</td>
                    <td>{{ $movie->gender->name }}</td>
                    <td>
                        <a href="{{ url('/movies/'.$movie->id.'/edit') }}" class="btn btn-primary">Edit</a>

                        <form method="post" action="{{ url('/movies/'.$movie->id) }}" style="display: inline;" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('Are you sure to delete the movie: {{ $movie->name }}?');" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $movies->links() }}
</div>
@endsection