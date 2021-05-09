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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        All Sliders
                    </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">title</th>
                            <th scope="col">description</th>
                            <th scope="col">image</th>
                            <th scope="col">created_at</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($sliders as $slider)
                            <tr>
                                <th scope="row">{{$slider -> id}}</th>
                                <td>{{$slider -> title}}</td>
                                <td>{{$slider -> description}}</td>
                                <td>  <img style="width: 100px; height: 100px" src="{{$slider -> image}}"></td>
                                <td>{{Carbon\Carbon::parse($slider -> created_at)-> diffForHumans()}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('slider.edit',$slider ->id)}}">Edit</a>
                                    <a class="btn btn-danger" href="{{route('slider.delete',$slider ->id)}}">
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

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Add Slider
                    </div>
                    <div class="card-body">
                        <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">slider title</label>
                                <input name="title" class="form-control" id="">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">slider description</label>
                                <input name="description" class="form-control" id="">
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">slider Image</label>
                                <input type="file" name="image" class="form-control" id="">
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add slider Image</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @stop

