@extends('layout')
@section('content')
     
        @isset($show)
        <?php
                    $title = 'Edit Show';
                    $button = 'Update Show';

                ?>
        @else
                <?php
                    $title = 'Show';
                    $button = 'Add Show';
                ?>

        @endif
    <div class="row d-flex justify-content-center mt-5">
        <form action="{{ isset($show) ? route('shows.update', $show->id) : route('shows.store') }}" method="POST" class="form-inline">
        <div class="card" style="width:35em">
            <div class="card-header text-center">
            {{ $title }}
            </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ ucwords($error) }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="text-center">
                    <div class="form-group margin-chris">
                        @csrf
                        @isset($show)
                              @method('PATCH')
                        @endif

                        <label for="name" class="show-label">Show Name :</label>
                        <input type="text" class="form-control" name="show_name" id="show_name" style="width:360px;" autocomplete="off" value="{{ $show->show_name ?? '' }}" >
                    </div>
                    <div class="form-group margin-chris">
                        <label for="price" class="show-label">Genre : </label>
                        <input type="text" class="form-control" name="genre" id="genre" style="width:360px;" autocomplete="off" value="{{ $show->genre ?? '' }}">
                    </div>
                    <div class="form-group margin-chris">
                        <label for="imdb" class="show-label">IMDB Rating : </label>
                        <input type="text" class="form-control" name="imdb_rating" id="imdb_rating" style="width:360px;" autocomplete="off" value="{{ $show->imdb_rating ?? '' }}">
                    </div>
                    <div class="form-group margin-chris mb-4">
                        <label for="lead_actor" class="show-label">Lead Actor : </label>
                        <input type="text" class="form-control" name="lead_actor" id="lead_actor" style="width:360px;" autocomplete="off" value="{{ $show->lead_actor ?? '' }}">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">{{ $button }}</button>
                </div>
            </div>

    
        </form>
    </div>
 
@endsection