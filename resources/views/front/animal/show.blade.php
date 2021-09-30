@extends('layouts.template')
@section('title', 'Animal')
@section('content')
<div class="row">
    <div class="col-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Animal</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <form action="{{ route('animal.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Hewan</label>
                                <input type="text" readonly class="form-control @error('nama') is-invalid @enderror"
                                    placeholder="Masukkan Nama Hewan" name="nama" value="{{ $animal->nama }}">
                                @error('nama')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Suara</label>
                                <input type="text" readonly class="form-control @error('umur') is-invalid @enderror"
                                    placeholder="Masukkan Umur Hewan" name="umur" value="{{ $animal->suara->suara }}">
                            </div>
                            <div class="form-group">
                                <label for="">Umur</label>
                                <input type="text" readonly class="form-control @error('umur') is-invalid @enderror"
                                    placeholder="Masukkan Umur Hewan" name="umur" value="{{ $animal->usia }} Tahun">
                                @error('umur')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Kaki</label>
                                <input type="number" readonly class="form-control @error('umur') is-invalid @enderror"
                                    placeholder="Masukkan Umur Hewan" name="umur" value="{{ $animal->jumlah_kaki }}">
                                @error('umur')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="deskripsi" readonly class="form-control @error('deskripsi') is-invalid @enderror" id="" cols="30" rows="5">{{ $animal->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex">
                                <a href="{{ route('animal.index') }}" class="btn btn-danger mr-1">Kembali</a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-12">
                        <img src="/foto-animal/{{ $animal->foto }}" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection