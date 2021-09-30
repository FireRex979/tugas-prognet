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
                <form action="{{ route('animal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Hewan</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            placeholder="Masukkan Nama Hewan" name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Suara</label>
                        <select name="suara" class="form-control @error('suara') is-invalid @enderror" id="">
                            @foreach ($suara as $item)
                                <option value="{{ $item->id }}" @if(old('suara') == $item->id) selected @endif>{{ $item->suara }}</option>
                            @endforeach
                        </select>
                        @error('suara')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Umur</label>
                        <input type="number" class="form-control @error('umur') is-invalid @enderror"
                            placeholder="Masukkan Umur Hewan" name="umur" value="{{ old('umur') }}">
                        @error('umur')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Kaki</label>
                        <select name="kaki" class="form-control @error('kaki') is-invalid @enderror" id="">
                            <option value="2" @if(old('kaki') == '2') selected @endif>2</option>
                            <option value="2" @if(old('kaki') == '4') selected @endif>4</option>
                        </select>
                        @error('kaki')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                            name="foto" value="">
                        @error('foto')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="" cols="30" rows="5">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('animal.index') }}" class="btn btn-danger mr-1">Kembali</a>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection