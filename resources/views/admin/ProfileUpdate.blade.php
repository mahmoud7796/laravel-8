@extends('admin.dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex">
            <div class="col-md-8">
                @if(Session('error'))
                    <div class="row mr-2 ml-2 py-2">
                        <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                                id="type-error">{{Session('error')}}
                        </button>
                    </div>
                @endif
                    @if(Session('success'))
                        <div class="row mr-2 ml-2 py-2">
                            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                                    id="type-error">{{Session('success')}}
                            </button>
                        </div>
                    @endif
    <form action="{{route('update.profile')}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Name</label>
                <input name="name" type="name" value="{{$user -> name}}" class="form-control" placeholder="Your Name">
                @error('name')
                <div class="text-danger">
                   {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="email">E-mail</label>
                <input name="email" id="password"  value="{{$user -> email}}" type="email" class="form-control" placeholder="Your E-mail">
                @error('email')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

        </div>
        <button class="btn btn-primary" type="submit">Update Profile</button>
    </form>
        </div>
          </div>
            </div>

@stop

