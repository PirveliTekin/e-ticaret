@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Add Contact Profile</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('admincontact.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{old('email')}}" class="form-control" name="email" id="email" aria-describedby="email">
                            @error('email')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="phone" value="{{old('phone')}}" name="phone" id="phone" class="form-control" aria-describedby="phone">
                            @error('phone')
                            <span class="mt-2 d-block text-danger ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Map">Map</label>
                            <textarea name="map"  class="form-control" id="map" rows="3">{{old('map')}}</textarea>

                            @error('map')
                            <span class="mt-2 d-block text-danger ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Adres</label>
                            <textarea name="address"  class="form-control" id="address" rows="3">{{old('address')}}</textarea>
                            @error('address')
                            <span class="mt-2 d-block text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default float-right  ">Add Contact Profile</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
@endsection
