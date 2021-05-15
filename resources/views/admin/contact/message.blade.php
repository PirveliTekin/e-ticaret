@extends('admin.layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2 class="float-left">All Messages</h2>
                </div>
                <div class="card-body">
                    <table class="table table-responsive ">
                        <thead>
                        <tr>

                            <th scope="col" >Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Creat at</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contactMessages as $contactMessage )

                            <tr>

                                <td scope="row" >{{$contactMessage->name}}</td>
                                <td >{{$contactMessage->email}}</td>
                                <td >{{$contactMessage->subject}}</td>
                                <td >{{substr($contactMessage->message,0,50)}}</td>
                                <td >
                                    @if($contactMessage->created_at===null)
                                        <span>No Date Set</span>
                                    @else
                                        {{$contactMessage->created_at->diffForHumans()}}
                                    @endif

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


