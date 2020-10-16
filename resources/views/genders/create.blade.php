@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ url('/genders') }}" method="post" class="form-horizontal">
        {{ csrf_field() }}
        @include('genders.form', ['mode'=>'create'])
    </form>
</div>
@endsection