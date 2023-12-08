@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Form Rekomendasi
                </div>
                <div class="card-body">
                <form method="POST" action="/form">
                @csrf
                <div class="form-group">
                    <label for="Warna">Warna</label>
                    <select class="form-control" name="warna" id="Warna">
                        <option value="merah">Merah</option>
                        <option value="hitam">Hitam</option>
                        <option value="putih">Putih</option>
                        <option value="hijau">Hijau</option>
                        <option value="kuning">Kuning</option>
                        <option value="biru">Biru</option>
                    </select>
                    <label for="JenisKain">Jenis Kain</label>
                    <select class="form-control" name="jenis_kain" id="JenisKain">
                        <option value="classic">Classic</option>
                        <option value="katun">Katun Sutra</option>
                    </select> 
                    <label for="Harga">Harga</label>
                    <select class="form-control" name="harga" id="Harga">
                        <option value="500000">500.000</option>
                        <option value="750000">750.000</option>
                        <option value="1000000">1.000.000</option>
                    </select>
                    <button type="submit" class="btn btn-primary mb-2">Kirim</button>
                </div>
            </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection