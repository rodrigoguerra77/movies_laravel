@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div> 
    @endif

    <a href="{{ url('genders/create') }}" class="btn btn-success">Add Gender</a>

    <br>
    <br>

    <table class="table table-light">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genders as $gender)
                <tr>
                    <td>{{ $gender->id }}</td>
                    <td>{{ $gender->name }}</td>
                    <td>
                        <a href="{{ url('/genders/'.$gender->id.'/edit') }}" class="btn btn-primary">Edit</a>

                        <form method="post" action="{{ url('/genders/'.$gender->id) }}" style="display: inline;" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('Are you sure to delete the gender: {{ $gender->name }}?');" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $genders->links() }}
</div>
@endsection
