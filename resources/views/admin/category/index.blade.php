<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
            <button type="button" class="btn btn-primary float-right">
                <span class="badge badge-light"></span>
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
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Category
                        </div>
                        <div class="card-body">
                            @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">{{ Session::get('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </button>
                                </div>
                                {{Session::forget('error')}}
                            @elseif(Session::has('success'))
                                <div class="alert alert-success" role="alert">{{ Session::get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">x</span>
                                    </button>
                                </div>
                                {{Session::forget('success')}}
                            @endif
                            <form action="{{route('category.store')}}" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="category_name">Category Name</label>
                                    <input name="category_name" id="category_name" type="text" class="form-control">
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-right ">Add Category</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
</x-app-layout>
