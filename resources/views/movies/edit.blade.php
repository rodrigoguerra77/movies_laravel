@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/movies/'.$movie->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        @include('movies.form', ['mode'=>'edit'])
    </form>
</div>
@endsection