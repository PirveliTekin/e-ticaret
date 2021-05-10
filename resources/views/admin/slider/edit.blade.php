@extends('admin.layouts.master')
@section('content')
    <div class="row">
        @include('admin.slider.common.table')
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Slider</h2>
                </div>
                <div class="card-body">

                    <form action="{{route('slider.update',$singleSlider->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="old_image" value="{{$singleSlider->image}}">
                        <div class="form-group ">
                            <label for="title">Slider Title</label>
                            <input value="{{$singleSlider->title}}" name="title" id="title"
                                   type="text" class="form-control">
                            @error('title')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description"  class="form-control" id="description" rows="3">{{$singleSlider->description}}</textarea>
                            @error('description')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="slider_image">slider İmage</label>
                            <input value="{{$singleSlider->image}}" name="image" id="image"
                                   type="file" class="form-control-file">
                            @error('image')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img style="display:block;margin: 0 auto;width: 10em"
                                 src="{{asset($singleSlider->image)}}" alt="{{$singleSlider->title}}">
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default ">Update Slider</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

