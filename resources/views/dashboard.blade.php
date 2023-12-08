@extends('layouts.app')

@section('content')
<!-- <style>
    * {
        border: red solid 1px;
    }
</style> -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="row">
                    @foreach($data as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ 'img_batik/'.$item->image }}" class="card-img-top" alt="{{ $item->image }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->motif }}</h5>
                                <!-- Add other details or actions related to the image if needed -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row justify-content-center m-4">
                    <a class="btn btn-primary" style="width: 18rem;" href="/form" role="button">Form</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection