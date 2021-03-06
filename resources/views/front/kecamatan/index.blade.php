@extends('layouts.template')
@section('title', 'Kecamatan')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<div class="d-flex justify-content-between align-items-center">
					<h6 class="m-0 font-weight-bold text-primary">Data Kecamatan</h6> <a href="{{ route('kecamatan.create') }}" class="btn btn-success">Tambah</a></div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th style="width: 50px">No</th>
								<th>Nama Kecamatan</th>
								<th>Nama Kabupaten</th>
								<th class="text-center" style="width: 150px">Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th style="width: 50px">No</th>
								<th>Nama Kecamatan</th>
								<th>Nama Kabupaten</th>
								<th class="text-center" style="width: 150px">Action</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach ($kecamatan as $item)
								<tr style="width: 50px">
									<td>{{ $loop->iteration }}</td>
									<td>{{ $item->nama_kecamatan }}</td>
									<td>{{ $item->kabupaten->city_name }}</td>
									<td class="text-center" style="width: 150px">
										<a class="btn btn-sm btn-warning" href="{{ route('kecamatan.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
										<button class="btn btn-sm btn-danger" onclick="destroy('{{ $item->id }}')" type="button"><i class="fa fa-trash"></i></button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{!! $kecamatan->links() !!}
			</div>
		</div>
	</div>
</div>
<form action="{{ route('kecamatan.delete') }}" id="form-delete" method="POST"> @csrf
	<input type="hidden" name="id" id="id-delete">
</form>
@endsection
@push('js')
<script>
	function destroy(id) {
		$('#id-delete').val(id);
		swal({
			title: 'Anda yakin ingin menghapus data?',
			text: 'Data yang terhapus akan hilang!',
			icon: 'warning',
			buttons: ["Tidak", "Ya"],
		}).then(function(value) {
			if(value) {
				$('#form-delete').submit();
			}
		});
	}
</script>
@endpush