@extends('admin.dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex">
            <div class="col-md-8">
                <form action="{{route('contactForm.update', $messages -> id)}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="address">Name</label>
                            <input name="name" type="text" value="{{$messages -> name}}" class="form-control" placeholder="Your name">
                            @error('name')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="email">E-mail</label>
                            <input name="email" value="{{$messages -> email}}" type="email" class="form-control" placeholder="Your E-mail">
                            @error('email')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="subject">Subject</label>
                            <input name="subject" value="{{$messages -> subject}}" type="text" class="form-control" placeholder="Your subject">
                            @error('subject')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="exampleFormControlTextarea1">Messages</label>
                            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$messages -> message}}</textarea>
                            @error('message')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                    </div>
                    <button class="btn btn-primary" type="submit">Edit contact</button>
                </form>
            </div>
        </div>
    </div>

@stop

