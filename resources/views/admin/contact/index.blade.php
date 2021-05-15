@extends('admin.layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2 class="float-left">Add Contact Profile</h2>
                </div>
                <div class="card-body">
                    <a href="{{route('admincontact.create')}}" class="btn btn-info float-left mb-5">Add Profile</a>
                    <table class="table table-responsive ">
                        <thead>
                        <tr>

                            <th scope="col" >Email</th>
                            <th scope="col">Adres</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Map</th>
                            <th scope="col">Creat at</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contactProfiles as $contactProfile )

                            <tr>

                                <td scope="row" >{{$contactProfile->email}}</td>
                                <td >{{$contactProfile->address}}</td>
                                <td >{{$contactProfile->phone}}</td>
                                <td >{{substr($contactProfile->map,0,50)}}</td>
                                <td >
                                    @if($contactProfile->created_at===null)
                                        <span>No Date Set</span>
                                    @else
                                        {{$contactProfile->created_at->diffForHumans()}}
                                    @endif

                                </td>
                                <td >
                                    <a href="{{route('admincontact.edit',$contactProfile->id)}}" class="btn btn-info ">Edit</a>
                                    <a href="{{route('adminContactDelete',$contactProfile->id)}}" title="DİKKAT !"
                                       data="Silmek İstediğinizden Emin misiniz?" class="btn btn-danger delete-confirm">Delete</a>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

        </div>


    </div>

@endsection

