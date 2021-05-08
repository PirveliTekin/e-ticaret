<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Multipic  Upload
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                @include('admin.multipics.common.table')
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add İmages
                        </div>
                        <div class="card-body">

                            <form action="{{route('multipicAdd')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('HEAD')
                                <div class="form-group mb-2">
                                    <label for="image">İmage</label>
                                    <input name="image[]"  type="file" class="form-control" multiple="">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-right ">Add İmage</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
