<form action="{{ url('/genders') }}" method="post">
    {{ csrf_field() }}
    @include('genders.form', ['mode'=>'create'])
</form>
