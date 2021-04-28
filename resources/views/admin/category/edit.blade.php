<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Category
        </h2>
    </x-slot>

    <div class="py-12 container">
        @if(Session('success'))
            <div class="row mr-2 ml-2 py-2">
                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                        id="type-error">{{Session('success')}}
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col md-8">
                <div class="card">
                    <div class="card-header">
                        All Category
                    </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Category name</th>
                    <th scope="col">User</th>
                    <th scope="col">created_at</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($categories)
                    <tr>
                        <th scope="row">{{$categories-> id}}</th>
                        <td>{{$categories-> category_name}}</td>
                        <td>{{$categories-> users-> name}}</td>
                        <td>{{Carbon\Carbon::parse($categories-> created_at)-> diffForHumans()}}</td>
                        <td>
                            <a href="">
                            <button class="btn btn-primary">
                                Edit
                            </button>
                            </a>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
                </div>
            </div>

            <div class="col md-4">
                <div class="card">
                    <div class="card-header">
                        Add Category
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.update', $categories-> id)}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Category Name</label>
                                <input name="category_name" value="{{$categories-> category_name}}" class="form-control" id="">
                                @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-app-layout>
