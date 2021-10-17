@extends('layouts.template')
@section('title', 'Kabupaten')
@section('content')
<div class="row">
    <div class="col-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kabupaten</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('kabupaten.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="provinsi_id" class="form-control" id="">
                            @foreach ($provinsi as $item)
                                <option value="{{ $item->id }}" @if(old('provinsi_id') == $item->id) selected @endif>{{ $item->province }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kabupaten</label>
                        <input type="text" class="form-control @error('nama_kabupaten') is-invalid @enderror"
                            placeholder="Masukkan Nama Kabupaten" name="nama_kabupaten" value="{{ old('nama_kabupaten') }}">
                        @error('nama_kabupaten')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Kode POS</label>
                        <input type="text" class="form-control @error('kode_pos') is-invalid @enderror"
                            placeholder="Masukkan Nama Kabupaten" name="kode_pos" value="{{ old('kode_pos') }}">
                        @error('kode_pos')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('kabupaten.index') }}" class="btn btn-danger mr-1">Kembali</a>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection