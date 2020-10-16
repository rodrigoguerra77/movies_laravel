<div class="form-group">
    <label for="name" class="control-label">Name:</label>
    <input type="text" name="name" id="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" value="{{ isset($gender->name)?$gender->name:old('name') }}">
    {!! $errors->first('name','<div class="invalid-feeback">:message</div>') !!}
</div>
<input type="submit" class="btn {{ ($mode == 'create')?'btn-success':'btn-primary' }}" value="{{ ($mode == 'create')?'Save':'Update' }}">
<a href="{{ url('genders') }}" class="btn btn-secondary">Back</a>