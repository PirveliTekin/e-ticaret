<div class="col-md-8">

    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Slider List</h2>
        </div>
        <div class="card-body">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">İmage</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $slider)
                    <tr>
                        <th scope="row">{{$sliders->firstItem() + $loop->index}}</th>
                        <td>{{$slider->title}}</td>
                        <td><img width="100"  src="{{url($slider->image)}}" alt="{{$slider->title}}"></td>
                        <td>
                            @if($slider->created_at===null)
                                <span>No Date Set</span>
                            @else
                                {{$slider->created_at->diffForHumans()}}
                            @endif

                        </td>
                        <td>
                            <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-info ">Edit</a>
                            <a href="{{route('sliderDelete',$slider->id)}}" class="btn btn-danger ">Delete</a>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div>
            <nav class="float-right m-3" aria-label="Page navigation example">
                {{$sliders->links()}}
            </nav>
        </div>
    </div>

</div>
