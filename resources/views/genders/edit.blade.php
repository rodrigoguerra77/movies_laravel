<form action="{{ url('/genders/'.$gender->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('genders.form', ['mode'=>'edit'])
</form>
