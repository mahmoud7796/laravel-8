@extends('admin.dashboard')

@section('content')
    <div class="py-12 container">
        @if(Session('success'))
            <div class="row mr-2 ml-2 py-2">
                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                        id="type-error">{{Session('success')}}
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('contactForm.create')}}">
                    <button class="btn btn-alert btn-primary">Create new contact</button>
                </a>
                <div class="card">
                    <div class="card-header">
                       About
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" style="width:10%">id</th>
                            <th scope="col" style="width:10%">name</th>
                            <th scope="col" style="width:25%">subject</th>
                            <th scope="col" style="width:25%">message</th>
                            <th scope="col" style="width:15%">created_at</th>
                            <th scope="col" style="width:15%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($messages as $message)
                            <tr>
                                <th scope="row">{{$message -> id}}</th>
                                <td>{{$message -> name}}</td>
                                <td> {{$message -> subject}}</td>
                                <td> {{$message -> message}}</td>
                                <td>{{Carbon\Carbon::parse($message -> created_at)-> diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('contactForm.edit',$message ->id)}}">Edit</a>
                                    <a class="btn btn-danger" href="{{route('contactForm.delete',$message ->id)}}">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--        {!! $brands -> links() !!}--}}
                </div>
            </div>
        </div>
    </div>
    @stop

