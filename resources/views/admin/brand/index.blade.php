@extends('admin.layouts.master')
@section('content')

    <div class="row">
        @include('admin.brand.common.table')
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add Brand</h2>
                </div>
                <div class="card-body">

                    <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="brand_name">Brand Name</label>
                            <input name="brand_name" id="brand_name" type="text" class="form-control">
                            @error('brand_name')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="brand_image">Brand İmage</label>
                            <input name="brand_image" id="brand_image" type="file" class="form-control-file">
                            @error('brand_image')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default ">Add Brand</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

