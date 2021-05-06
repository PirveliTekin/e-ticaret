<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brands
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
                            All Brands
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Brands Name</th>
                                    <th scope="col">Brands İmage</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($brands as $brand)
                                    <tr>
                                        <th scope="row">{{$brands->firstItem() + $loop->index}}</th>
                                        <td>{{$brand->brand_name}}</td>
                                        <td><img width="100"  src="{{$brand->brand_image}}" alt="{{$brand->brand_name}}"></td>
                                        <td>
                                            @if($brand->created_at===null)
                                                <span>No Date Set</span>
                                            @else
                                                {{$brand->created_at->diffForHumans()}}
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-info ">Edit</a>
                                            <a href="{{route('brandDelete',$brand->id)}}" class="btn btn-danger ">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <nav aria-label="Page navigation example">
                                {{$brands->links()}}
                            </nav>
                        </div>

                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Brand
                        </div>
                        <div class="card-body">

                            <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="brand_name">Brand Name</label>
                                    <input name="brand_name" id="brand_name" type="text" class="form-control">
                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="brand_image">Brand İmage</label>
                                    <input name="brand_image" id="brand_image" type="file" class="form-control">
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-right ">Add Brand</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
