<div class="col-md-8">
    @if (Session('error'))

        <div class="alert alert-dismissible fade show alert-danger" role="alert">
            <strong>{{ Session('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        {{Session::forget('error')}}
    @elseif(Session('success'))

        <div class="alert alert-dismissible fade show alert-success" role="alert">
            <strong>{{ Session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        {{Session::forget('success')}}
    @endif
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Brand List</h2>
        </div>
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Brands Name</th>
                    <th scope="col">Brands İmage</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <th scope="row">{{$brands->firstItem() + $loop->index}}</th>
                        <td>{{$brand->brand_name}}</td>
                        <td><img width="100"  src="{{url($brand->brand_image)}}" alt="{{$brand->brand_name}}"></td>
                        <td>
                            @if($brand->created_at===null)
                                <span>No Date Set</span>
                            @else
                                {{$brand->created_at->diffForHumans()}}
                            @endif

                        </td>
                        <td>
                            <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-info ">Edit</a>
                            <a href="{{route('brandDelete',$brand->id)}}" class="btn btn-danger ">Delete</a>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div>
            <nav class="float-right m-3" aria-label="Page navigation example">
                {{$brands->links()}}
            </nav>
        </div>
    </div>

</div>
