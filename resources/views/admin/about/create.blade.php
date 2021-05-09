@extends('admin.dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex">
            <div class="col-md-8">
    <form action="{{route('about.store')}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Title</label>
                <input name="title" type="text" class="form-control" id="validationServer01" placeholder="Title">
                @error('title')
                <div class="text-danger">
                   {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="validationServer02">Short description</label>
                <input name="shor_des" type="text" class="form-control" id="validationServer02" placeholder="Short description">
                @error('shor_des')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="exampleFormControlTextarea1">Long Description</label>
                <textarea name="lon_des" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                @error('lon_des')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Add about</button>
    </form>
        </div>
          </div>
            </div>

@stop

