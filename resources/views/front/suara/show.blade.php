@extends('layouts.template')
@section('title', 'Suara')
@section('content')
<div class="row">
    <div class="col-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Suara</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('suara.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Bunyi Suara Hewan</label>
                        <input type="text" readonly class="form-control @error('suara') is-invalid @enderror"
                            placeholder="Masukkan Suara Hewan" name="suara" value="{{ $suara->suara }}">
                        @error('suara')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('suara.index') }}" class="btn btn-danger mr-1">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection