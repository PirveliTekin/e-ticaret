@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add About</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('aboutadmin.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" value="{{old('title')}}" class="form-control" name="title" id="title" aria-describedby="title">
                            @error('title')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="short_dis">Short Description</label>
                            <textarea name="short_dis"  class="form-control" id="short_dis" rows="3">{{old('short_dis')}}</textarea>
                            @error('short_dis')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="long_dis">Long Description</label>
                            <textarea name="long_dis"  class="form-control" id="long_dis" rows="3">{{old('long_dis')}}</textarea>
                            @error('long_dis')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default float-right  ">Add About</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
@endsection
