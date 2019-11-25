@extends('layout')
@section('content')
<style>
    .show-label{
        width : 200px;
    }
    input, select{
        width: 360px!important;
    }
</style>

    <div class="row d-flex justify-content-center mt-5">
        <form action="{{ route('audiences.update', $audiences->id) }}" method="post" class="form-inline">
            <div class="card" style="width:40em">
                <div class="card-header text-center">
                    Edit Audience
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ ucwords($error) }}</li>
                    @endforeach
                    </div>
                @endif
                @csrf
                @method('PUT')
                <div class="form-group margin-chris mt-5">
                    <label for="first_name" class="show-label">First Name </label>
                    <input type="text" class="form-control" name="first_name" id="first_name" autocomplete="off" value="{{ $audiences->first_name }}">

                </div>
                <div class="form-group margin-chris">
                    <label for="middle_name" class="show-label">Middle Name </label>
                    <input type="text" class="form-control" name="middle_name" id="middle_name" autocomplete="off" value="{{ $audiences->middle_name }}">
                </div>
                <div class="form-group margin-chris">
                    <label for="last_name" class="show-label">Last Name </label>
                    <input type="text" class="form-control" name="last_name" id="last_name" autocomplete="off" value="{{ $audiences->last_name }}">
                </div>
                <div class="form-group margin-chris">
                    <label for="birthday" class="show-label">Birthday </label>
                    <input type="date" class="form-control" name="birthday" id="birthday" autocomplete="off" value="{{ $audiences->birthday }}">
                </div>
                <div class="form-group margin-chris">
                    <label for="birth_place" class="show-label">Birth Place </label> 
                    <input type="text" class="form-control" name="birth_place" id="birth_place" autocomplete="off" value="{{ $audiences->birth_place }}">
                </div>
                <div class="form-group margin-chris">
                    <label for="age" class="show-label">Age </label>
                    <input type="number" class="form-control" name="age" id="age" value="{{ $audiences->age }}">
                </div>
                <div class="form-group margin-chris mb-5">
                     <label for="age" class="show-label">Sex </label>
                     <select class="form-control" name="sex" id="sex">
                        <option></option>
                        <option {{ $audiences->sex == 'Male' ? 'selected' : "" }} value="Male">Male</option>
                        <option {{ $audiences->sex == 'Female' ? 'selected' : "" }} value="Female">Female</option>
                     </select>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>


        </form>

    </div>

@endsection