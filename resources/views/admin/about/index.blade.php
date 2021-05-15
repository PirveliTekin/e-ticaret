@extends('admin.layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2 class="float-left">Home About</h2>
                </div>
                <div class="card-body">
                    <a href="{{route('aboutadmin.create')}}" class="btn btn-info float-left mb-5">Add About</a>
                    <table class="table table-hover">
                        <thead>
                        <tr class="d-flex">

                            <th class="col-2">Title</th>
                            <th class="col-3">Short Description</th>
                            <th class="col-4">Long Description</th>
                            <th class="col-1">Creat at</th>
                            <th class="col-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($homeAbouts as $homeAbout )

                            <tr class="d-flex">

                                <td class="col-2">{{$homeAbout->title}}</td>
                                <td class="col-3">{{$homeAbout->short_dis}}</td>
                                <td class="col-4">{{$homeAbout->long_dis}}</td>
                                <td class="col-1">
                                    @if($homeAbout->created_at===null)
                                        <span>No Date Set</span>
                                    @else
                                        {{$homeAbout->created_at->diffForHumans()}}
                                    @endif

                                </td>
                                <td class="col-2">
                                    <a href="{{route('aboutadmin.edit',$homeAbout->id)}}" class="btn btn-info ">Edit</a>
                                    <a href="{{route('aboutDelete',$homeAbout->id)}}" title="DİKKAT !"
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

