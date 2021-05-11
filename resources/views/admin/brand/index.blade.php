@extends('admin.dashboard')

@section('content')
    <div class="py-12 container">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        All brand
                    </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">brand name</th>
                            <th scope="col">brand image</th>
                            <th scope="col">created_at</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($brands as $brand)
                            <tr>
                                <th scope="row" style="width:10%">{{$brand -> id}}</th>
                                <td style="width:10%">{{$brand -> brand_name}}</td>
                                <td style="width:15%">  <img style="width: 100px; height: 100px" src="{{$brand -> brand_image}}"></td>
                                <td>{{Carbon\Carbon::parse($brand -> created_at)-> diffForHumans()}}</td>
                                <td style="width:25%">
                                    <a class="btn btn-primary" href="{{route('brand.edit',$brand ->id)}}">Edit</a>
                                    <a class="btn btn-danger" href="{{route('brand.delete',$brand ->id)}}">
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
                        Add Category
                    </div>
                    <div class="card-body">
                        <form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Brand Name</label>
                                <input name="brand_name" class="form-control" id="">
                                @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Brand Image</label>
                                <input type="file" name="brand_image" class="form-control" id="">
                                @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add brand</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @stop

