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
                <a href="{{route('about.create')}}">
                    <button class="btn btn-alert btn-primary">Create new about</button>
                </a>
                <div class="card">
                    <div class="card-header">
                       About
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" style="width:10%">id</th>
                            <th scope="col" style="width:10%">title</th>
                            <th scope="col" style="width:25%">shor_des</th>
                            <th scope="col" style="width:25%">lon_des</th>
                            <th scope="col" style="width:15%">created_at</th>
                            <th scope="col" style="width:15%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($about as $_about)
                            <tr>
                                <th scope="row">{{$_about -> id}}</th>
                                <td>{{$_about -> title}}</td>
                                <td> {{$_about -> shor_des}}</td>
                                <td> {{$_about -> lon_des}}</td>
                                <td>{{Carbon\Carbon::parse($_about -> created_at)-> diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('about.edit',$_about ->id)}}">Edit</a>
                                    <a class="btn btn-danger" href="{{route('about.delete',$_about ->id)}}">
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

