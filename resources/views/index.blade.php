@extends('layout')
@section('content')

<div class="d-flex mt-3 justify-content-end">
<a href="{{ route('shows.create') }}" class="btn btn-success ">Add Show</a>

</div>
    <div class="row d-flex justify-content-center mt-2">

        @if(session()->get('success'))
            <div class="alert alert-success text-center">
            {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Show Name</th>
                <th>Genre</th>
                <th>IMDB Rating</th>
                <th>Lead Actor</th>
                <th>Encoder</th>
                <th>Action</th>
            </tr>
           <?php 
            $count = 0;
            ?>
            @foreach($show as $showArray)
                <tr>
                    <td>{{ ++$count }}</td>
                    <td>{{ $showArray->show_name }}</td>
                    <td>{{ $showArray->genre }}</td>
                    <td>{{ $showArray->imdb_rating }}</td>
                    <td>{{ $showArray->lead_actor }}</td>
                    <td>{{ $showArray->encodedUser->audience_data->first_name. " " .$showArray->encodedUser->audience_data->last_name }}</td>
                    <td style="white-space:nowrap">
                        <a href="{{ route('audiences_show.watch', $showArray->id) }}" class="btn btn-sm btn-primary">Watch</a>
                        <a href="{{ route('shows.edit', $showArray->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('shows.soft', $showArray->id) }}" method="post" style="display:inline-block">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Remove
                            </button>    
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection