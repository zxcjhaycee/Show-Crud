@extends('layout')

@section('content')
    <div class="row d-flex justify-content-center mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Show Name</th>
                    <th>Watch Count</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
            @php
            $i = 0;
            @endphp
            @foreach($show as $shows)
                @php
                    $rating = 0;
                @endphp
                @foreach($shows->audience as $audience)
                    @php
                    $rating += $audience->pivot->rating;
                    @endphp
                @endforeach
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $shows->show_name }}</td>
                    <td>{{ count($shows->audience) > 0 ? count($shows->audience) : '0' }}</td>
                    <td>{{ count($shows->audience) > 0 ? $rating / count($shows->audience) : '0' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection