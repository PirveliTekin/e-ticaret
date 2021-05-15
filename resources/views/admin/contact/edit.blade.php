@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Contact Profile</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('admincontact.update',$adminContact->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{$adminContact->email}}" class="form-control" name="email" id="email" aria-describedby="email">
                            @error('email')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="phone" value="{{$adminContact->phone}}" name="phone" id="phone" class="form-control" aria-describedby="phone">
                            @error('phone')
                            <span class="mt-2 d-block text-danger ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">

                            <label for="Map">Map</label>
                            <textarea name="map"  class="form-control" id="map" rows="3">{{$adminContact->map}}</textarea>

                            @error('map')
                            <span class="mt-2 d-block text-danger ">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="address">Adres</label>
                            <textarea name="address"  class="form-control" id="address" rows="3">{{$adminContact->address}}</textarea>
                            @error('address')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default float-right  ">Update Contact Profile</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
@endsection
