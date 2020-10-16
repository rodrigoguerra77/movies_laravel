@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div> 
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Movies</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Year Published</th>
                                <th>Gender</th>
                                <th>Total Likes</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movies as $movie)
                                <tr>
                                    <td>{{ $movie->id }}</td>
                                    <td>{{ $movie->movie }}</td>
                                    <td>{{ $movie->year_published }}</td>
                                    <td>{{ $movie->gender }}</td>
                                    <td>{{ $movie->likes }}</td>
                                    <td>
                                        @if($movie->user_likes == 0)
                                            <a href="{{ url('/home/like/'.$movie->id) }}" class="btn btn-primary">Like</a>
                                        @else
                                        <a href="{{ url('/home/dont-like/'.$movie->id) }}" class="btn btn-secondary">I don't like</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
