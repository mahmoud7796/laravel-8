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
                        All images
                    </div>
                    <div class="card-group">
                        @foreach($images as $image)
                            <div class="col-md-4 mt-7">
                                <div class="card">
                                <img src="{{asset($image -> images)}}" alt="Nature">
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Add images
                    </div>
                    <div class="card-body">
                        <form action="{{route('multi.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Add Images</label>
                                <input type="file" name="image[]" class="form-control" multiple>
                                @error('images')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add images</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
