@extends('admin.dashboard')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex">
            <div class="col-md-8">
    <form action="{{route('contactForm.store')}}" method="POST">
        @csrf
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="Name">Name</label>
                <input name="name" type="text" class="form-control" placeholder="Your Name">
                @error('name')
                <div class="text-danger">
                   {{$message}}
                </div>
                @enderror
            </div>
            <div class="col-md-12 mb-3">
                <label for="email">E-mail</label>
                <input name="email" class="form-control" placeholder="Your E-mail">
                @error('email')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="subject">Subject</label>
                <input name="subject" type="subject" class="form-control" placeholder="Your Subject">
                @error('subject')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="message">Message</label>
                <textarea name="message" class="form-control" placeholder="Type Your Message Here"></textarea>
                @error('message')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>


        </div>
        <button class="btn btn-primary" type="submit">Add contact</button>
    </form>
        </div>
          </div>
            </div>

@stop

