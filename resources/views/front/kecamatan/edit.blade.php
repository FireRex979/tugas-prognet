@extends('layouts.template')
@section('title', 'Kecamatan')
@section('content')
<div class="row">
    <div class="col-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Kecamatan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('kecamatan.update', [$kecamatan->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="provinsi_id" class="form-control" onchange="getKecamatan()" id="provinsi">
                            @foreach ($provinsi as $item)
                                <option value="{{ $item->id }}" @if(old('provinsi_id') ?? $kecamatan->kabupaten->province_id == $item->id) selected @endif>{{ $item->province }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kabupaten</label>
                        <select name="kabupaten_id" class="form-control" id="kabupaten">
                            @foreach ($kabupaten as $item)
                                <option value="{{ $item->id }}" @if(old('kabupaten_id') ?? $kecamatan->kabupaten_id == $item->id) selected @endif>{{ $item->city_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kecamatan</label>
                        <input type="text" class="form-control @error('nama_kecamatan') is-invalid @enderror"
                            placeholder="Masukkan Nama Kabupaten" name="nama_kecamatan" value="{{ old('nama_kecamatan') ?? $kecamatan->nama_kecamatan }}">
                        @error('nama_kecamatan')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('kecamatan.index') }}" class="btn btn-danger mr-1">Kembali</a>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script>
        getKecamatan = () => {
            let provinsi_id = $('#provinsi').val();
            $.ajax({
                url: '{{ route("kecamatan.get-kabupaten") }}',
                method: 'GET',
                data: {
                    provinsi_id: provinsi_id
                },
                success: function(response) {
                    $('#kabupaten').empty();
                    let selected = '';
                    for(let i = 0; i < response.data.length; i++) {
                        if ('{{ old("kabupaten_id") }}' == response.data[i]['id']) {
                            selected = 'selected';
                        }
                        let option = '<option value="'+response.data[i]['id']+'" '+selected+'>'+response.data[i]['city_name']+'</option>';
                        $('#kabupaten').append(option);
                    }
                }
            });
        }
        $(document).ready(function () {
            if ('{{ old("provinsi_id") }}') {
                getKecamatan();
            }
        });
    </script>
@endpush