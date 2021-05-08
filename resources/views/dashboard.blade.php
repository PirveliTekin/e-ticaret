<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Merhaba , {{Auth::user()->name}}
            <button type="button" class="btn btn-primary float-right">
                Total User <span class="badge bg-light text-dark">{{count($users)}}</span>
            </button>

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            All Category
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
