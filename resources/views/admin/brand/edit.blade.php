@extends('admin.layouts.master')
@section('content')
    <div class="row">
        @include('admin.brand.common.table')
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Brand</h2>
                </div>
                <div class="card-body">

                    <form action="{{route('brand.update',$singleBrand->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="old_image" value="{{$singleBrand->brand_image}}">
                        <div class="form-group ">
                            <label for="brand_name">Brand Name</label>
                            <input value="{{$singleBrand->brand_name}}" name="brand_name" id="brand_name"
                                   type="text" class="form-control">
                            @error('brand_name')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="brand_image">Brand İmage</label>
                            <input value="{{$singleBrand->brand_image}}" name="brand_image" id="brand_image"
                                   type="file" class="form-control-file">
                            @error('brand_image')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <img style="display:block;margin: 0 auto;width: 10em"
                                 src="{{asset($singleBrand->brand_image)}}" alt="{{$singleBrand->brand_name}}">
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary float-right ">Update Brand</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

