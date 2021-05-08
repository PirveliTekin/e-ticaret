<div class="col-md-8">
    @if (Session('error'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ Session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        {{Session::forget('error')}}
    @elseif(Session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        {{Session::forget('success')}}
    @endif
    <div class="card-group">


                @foreach($multiImages as $multiImage)
                <div class="col-md-4 mt-5">
                    <div class="card">
                            <img src="{{url($multiImage->image)}}">
                    </div>
                </div>
                @endforeach


    </div>

</div>
