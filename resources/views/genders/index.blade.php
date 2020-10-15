@if(Session::has('message')){{
    Session::get('message')
}}
@endif

<a href="{{ url('genders/create') }}">Add Gender</a>

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
                    <a href="{{ url('/genders/'.$gender->id.'/edit') }}">Edit</a>
                    
                    |

                    <form method="post" action="{{ url('/genders/'.$gender->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('Are you sure to delete the gender: {{ $gender->name }}?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
