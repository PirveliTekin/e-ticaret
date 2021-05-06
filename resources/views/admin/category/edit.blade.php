<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    @if (Session('error'))

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ Session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        {{Session::forget('error')}}
                    @elseif(Session('success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        {{Session::forget('success')}}
                    @endif
                    <div class="card">

                        <div class="card-header">
                            All Category
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$category->category_name}}</td>
                                        <td> {{$category->user->name}}</td>
                                        <td>
                                            @if($category->created_at===null)
                                                <span>No Date Set</span>
                                            @else
                                                {{$category->created_at->diffForHumans()}}
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{route('delete',$category->id)}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <nav aria-label="Page navigation example">
                                {{$categories->links()}}
                            </nav>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Edit Category
                        </div>
                        <div class="card-body">

                            <form action="{{route('category.update',$singleCategory->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-2">
                                    <label for="category_name" >Category Name</label>
                                    <input value="{{$singleCategory->category_name}}" name="category_name" id="category_name" type="text" class="form-control">
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-right ">Update Category</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
