@extends('layouts.template')
@section('title', 'Provinsi')
@section('content')
<div class="row">
    <div class="col-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Provinsi</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('provinsi.update', [$provinsi->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <input type="text" class="form-control @error('nama_provinsi') is-invalid @enderror"
                            placeholder="Masukkan Nama Provinsi" name="nama_provinsi" value="{{ old('nama_provinsi') ?? $provinsi->province }}">
                        @error('nama_provinsi')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('provinsi.index') }}" class="btn btn-danger mr-1">Kembali</a>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection