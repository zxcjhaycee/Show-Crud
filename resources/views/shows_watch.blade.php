@extends('layout')

@section('content')

    <div class="row d-flex justify-content-center mt-5">
        <form method="POST" action="{{ route('audiences_show.watch.submit', $id) }}" class="form-inline">
            <div class="card" style="width:30em">
                <div class="card-header text-center">
                    Watch Show
                </div>
                <div class="mb-4">
                    <div class="form-group margin-chris">
                        @csrf
                        <label for="rating" class="show-label">Rating</label>
                        <input type="text" class="form-control" name="rating" id="rating" style="width:250px;" autocomplete="off" />
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    
    </div>

@endsection