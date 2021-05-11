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
    <form action="{{route('update.password')}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Current Password</label>
                <input name="Oldpassword" type="password" class="form-control" id="current_password" placeholder="Your Current Password">
                @error('Oldpassword')
                <div class="text-danger">
                   {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="email">New Password</label>
                <input name="password" id="password" type="password" class="form-control" placeholder="Your New Password">
                @error('password')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="email">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Your Confirm Password">
                @error('password_confirmation')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

        </div>
        <button class="btn btn-primary" type="submit">Update Password</button>
    </form>
        </div>
          </div>
            </div>

@stop

