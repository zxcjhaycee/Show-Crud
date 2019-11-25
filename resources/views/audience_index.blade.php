@extends('layout')
@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}
        </div>
    @endif
    <div class="row d-flex justify-content-end mt-3">
        <a href="{{ route('audiences.create') }}" class="btn btn-success">Add Audience</a>
    </div>
    <div class="row d-flex justify-content-center mt-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Birthday</th>
                    <th>Birth Place</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $num = 0; ?>
            @foreach($audiences as $audience)
                <tr>
                    <td>{{ ++$num }}</td>
                    <td>{{ $audience->first_name }}</td>
                    <td>{{ $audience->middle_name }}</td>
                    <td>{{ $audience->last_name }}</td>
                    <td>{{ date('F d, Y', strtotime($audience->birthday)) }}</td>
                    <td>{{ $audience->birth_place }}</td>
                    <td>{{ $audience->age }}</td>
                    <td>
                         <a class="btn btn-success btn-sm" href="{{ route('audiences_show.index', $audience->id) }}">View Show</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('audiences.edit', $audience->id) }}">Edit</a>
                        <!-- <a class="btn btn-danger btn-sm" href="{{ route('audiences.destroy', $audience->id) }}">Delete</a> -->
                        <form action="{{ route('audiences.destroy', $audience->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
            
        </table>
    </div>
@endsection