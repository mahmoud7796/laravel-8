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
                        Edit Category
                    </div>
                    <div class="card-body">
                        <form action="{{route('slider.update',$sliders ->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="id" value="{{$sliders ->image}}" type="hidden">
                            <div class="form-group">
                                <div class="text-center">
                                    <img
                                        src="{{$sliders-> image}}"
                                        class="rounded-circle  w-25 p-3" alt="صورة الكاراسول  ">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Slider Image</label>
                                <input type="file" name="image" value="{{$sliders-> image}}" class="form-control" id="">
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Slider title</label>
                                <input name="title" value="{{$sliders->title}}" class="form-control" id="">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Slider description</label>
                                <input name="description" value="{{$sliders->description}}" class="form-control" id="">
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">update Slider</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @stop

