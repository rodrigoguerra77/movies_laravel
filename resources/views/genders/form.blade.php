<label for="name">Nombre:</label>
<input type="text" name="name" id="name" value="{{ isset($gender->name)?$gender->name:'' }}">
<input type="submit" value="{{ ($mode == 'create')?'Save':'Update' }}">
<a href="{{ url('genders') }}">Back</a>