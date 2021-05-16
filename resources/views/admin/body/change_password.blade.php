@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Password Change</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('update.password')}}" method="POST" >
                        @csrf

                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" name="current_password" class="form-control" id="current_password"
                                   placeholder="Current Password">
                            @error('current_password')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="New Password">
                            @error('password')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlPassword3"
                                   placeholder="Confirm Password">
                            @error('password_confirmation')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default float-right  ">Update About</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
