<div class="form-group">
    <label for="name" class="control-label">Title:</label>
    <input type="text" name="name" id="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" value="{{ isset($movie->name)?$movie->name:old('name') }}">
    {!! $errors->first('name','<div class="invalid-feeback">:message</div>') !!}
</div>
<div class="form-group">
    <label for="year_published" class="control-label">Year Published:</label>
    <select name="year_published" id="year_published" class="form-control {{$errors->has('year_published')?'is-invalid':''}}">
        @if($mode == 'edit')
            <option value="{{ $movie->year_published }}" selected>{{ $movie->year_published }}</option>
        @endif
        @for ($i = 2020; $i >= 1900; $i--)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
    {!! $errors->first('year_published','<div class="invalid-feeback">:message</div>') !!}
</div>
<div class="form-group">
    <label for="gender_id" class="control-label">Gender:</label>
    <select name="gender_id" id="gender_id" class="form-control {{$errors->has('gender_id')?'is-invalid':''}}">
        @if($mode == 'edit')
            <option value="{{ $movie->gender->id }}" selected>{{ $movie->gender->name }}</option>
        @endif
        @foreach($genders as $gender)
            <option value="{{ $gender->id }}" >{{ $gender->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('gender_id','<div class="invalid-feeback">:message</div>') !!}
</div>
<input type="submit" class="btn {{ ($mode == 'create')?'btn-success':'btn-primary' }}" value="{{ ($mode == 'create')?'Save':'Update' }}">
<a href="{{ url('movies') }}" class="btn btn-secondary">Back</a>