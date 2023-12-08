@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rekomendasi</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <h1>{{ $motif }}</h1>
                            <p>{{ $warna }}</p>
                            <p>{{ $jenis_kain }}</p>
                            <p>Rp.{{ $harga }}</p>
                        </div>
                        <div class="col-md-7">
                            <img src="{{ 'img_batik/'.$image }}" class="card-img-top" alt="{{ $image }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
