@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>User Edit</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('update.profile',$user->id)}}" method="POST">
                        @csrf
                        @method('GET')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" value="{{$user->name}}" class="form-control" name="name" id="name" aria-describedby="name">
                            @error('name')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{$user->email}}" class="form-control" name="email" id="email" aria-describedby="email">
                            @error('email')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default float-right  ">Update Profile</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
@endsection

