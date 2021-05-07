<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Brand
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                @include('admin.brand.common.table')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Edit Brand
                        </div>
                        <div class="card-body">

                            <form action="{{route('brand.update',$singleBrand->id)}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="old_image" value="{{$singleBrand->brand_image}}">
                                <div class="form-group mb-2">
                                    <label for="brand_name">Brand Name</label>
                                    <input value="{{$singleBrand->brand_name}}" name="brand_name" id="brand_name"
                                           type="text" class="form-control">
                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="brand_image">Brand İmage</label>
                                    <input value="{{$singleBrand->brand_image}}" name="brand_image" id="brand_image"
                                           type="file" class="form-control">
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <img style="display:block;margin: 0 auto;width: 10em"
                                         src="{{asset($singleBrand->brand_image)}}" alt="{{$singleBrand->brand_name}}">
                                </div>
                                <button type="submit" class="btn btn-primary float-right ">Update Brand</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
