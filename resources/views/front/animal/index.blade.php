@extends('layouts.template')
@section('title', 'Animal')
@section('content')
<div class="row">
    <div class="col-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Animal</h6>
                    <a href="{{ route('animal.create') }}" class="btn btn-success">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Nama</th>
                                <th>Suara</th>
                                <th>Jumlah Kaki</th>
                                <th>Umur</th>
                                <th class="text-center" style="width: 150px">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Nama</th>
                                <th>Suara</th>
                                <th>Jumlah Kaki</th>
                                <th>Umur</th>
                                <th class="text-center" style="width: 150px">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($animal as $item)
                                <tr style="width: 50px">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->suara->suara }}</td>
                                    <td>{{ $item->jumlah_kaki }}</td>
                                    <td>{{ $item->usia }}</td>
                                    <td class="text-center" style="width: 150px">
                                        <a class="btn btn-sm btn-primary" href="{{ route('animal.show', $item->id) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-sm btn-warning" href="{{ route('animal.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                        <button class="btn btn-sm btn-danger" onclick="destroy('{{ $item->id }}')" type="button"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('animal.delete') }}" id="form-delete" method="POST">
    @csrf
    <input type="hidden" name="id" id="id-delete">
</form>
@endsection
@push('js')
    <script>
        function destroy(id){
            $('#id-delete').val(id);
            swal({
                title: 'Anda yakin ingin menghapus data?',
                text: 'Data yang terhapus akan hilang!',
                icon: 'warning',
                buttons: ["Tidak", "Ya"],
            }).then(function(value) {
                if (value) {
                    $('#form-delete').submit();
                }
            });
        }
    </script>
@endpush