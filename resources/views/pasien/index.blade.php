@extends('templates.header')
@push('style')
	<link rel="stylesheet" href="{{ asset('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="{{ asset('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="{{ asset('assets')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('contents')
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Data Pasien</h1>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm-create">
                  Tambah Data Pasien
                </button>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">Pasien</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

	<!-- Default box -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Pasien</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>Id</th>
								<th>Nama</th>
								<th>Alamat</th>
                                <th>No Telepon</th>
                                <th>RT/RW</th>
                                <th>Kelurahan</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
								{{-- <th>Action</th> --}}
							</tr>
							</thead>
							<tbody>
								@foreach ($result as $item)
									<tr>
										<td>{{ $item->id_pasien }}</td>
										<td>{{ $item->nama }}</td>
										<td>{{ $item->alamat }}</td>
                                        <td>{{ $item->no_telepon }}</td>
										<td>{{ $item->rt_rw }}</td>
										<td>{{ $item->kelurahan->nama_kelurahan }}</td>
                                        <td>{{ $item->tanggal_lahir }}</td>
										<td>{{ $item->jenis_kelamin }}</td>
										{{-- <td>
											<button type="button"
                                                    class="btn btn-warning"
                                                    data-toggle="modal"
                                                    data-target="#modal-sm"
                                                    data-id="{{$item->id_kelurahan}}"
                                                    data-kelurahan="{{ $item->nama_kelurahan }}"
                                                    data-kecamatan="{{ $item->nama_kecamatan }}"
                                                    data-kota="{{ $item->nama_kota }}">
                                                    Edit
                                            </button>
											<form action="{{ url("kelurahan/$item->id_kelurahan") }}/delete" method="POST" style="display:inline;">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<button class="btn btn-danger">
													Hapus
												</button>
											</form>
										</td> --}}
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>

</section>

<div class="modal fade" id="modal-sm-create">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Pasien</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ url('pasien/store') }}" method="POST">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="form-group">
                  <label for="kelurahan">Nama</label>
                  <input type="text" class="form-control" placeholder="Masukan Nama" name="nama">
                </div>
                <div class="form-group">
                  <label for="kecamatan">Alamat</label>
                  <textarea type="text" class="form-control" placeholder="Masukan Alamat" name="alamat"></textarea>
                </div>
                <div class="form-group">
                  <label for="kota">No Telepon</label>
                  <input type="text" class="form-control" placeholder="Masukan No Telepon" name="no_telepon">
                </div>
                <div class="form-group">
                  <label for="kelurahan">RT/RW</label>
                  <input type="text" class="form-control" placeholder="Masukan RT/RW" name="rt_rw">
                </div>
                <div class="form-group">
                  <label for="kecamatan">Kelurahan</label>
                  <select name="id_kelurahan" class="form-control">
                    <option value="" hidden>Pilih Kelurahan</option>
                    @foreach (App\Models\Kelurahan::all() as $item)
                    	<option value="{{$item->id_kelurahan}}">{{$item->nama_kelurahan}}</option>
                    @endforeach

                  </select>
                </div>
                <div class="form-group">
                  <label for="kota">Tanggal Lahir</label>
                  <input type="date" class="form-control" placeholder="Masukan Tanggal Lahir" name="tanggal_lahir">
                </div>
                <div class="form-group">
                  <label for="kelurahan">Jenis Kelamin</label><br>
                  <label><input type="radio" name="jenis_kelamin" value="Laki-Laki">Laki-Laki</label>
                  <label><input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan</label>
                </div>
              </div>
              <!-- /.card-body -->


          </div>
          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>



    {{-- <div class="modal fade" id="modal-sm">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Ubah Kelurahan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ url('kelurahan/update') }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('patch') }}
              <div class="card-body">
                <input id="id_kelurahan" type="hidden" name="id_kelurahan">
                <div class="form-group">
                  <label for="kelurahan">Kelurahan</label>

                  <input id="kelurahan" type="text" class="form-control" placeholder="Masukan kelurahan" name="nama_kelurahan">
                </div>
                <div class="form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input id="kecamatan" type="text" class="form-control" placeholder="Masukan Kecamatan" name="nama_kecamatan">
                </div>
                <div class="form-group">
                  <label for="kota">Kota</label>
                  <input id="kota" type="text" class="form-control" placeholder="Masukan Kota" name="nama_kota">
                </div>
              </div>
              <!-- /.card-body -->


          </div>
          <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div> --}}
@endsection
@push('script')
<script src="{{ asset('assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('assets')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('assets')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
{{-- <script>
$('#modal-sm').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var kelurahan = button.data('kelurahan');
    var kecamatan = button.data('kecamatan');
    var kota = button.data('kota');
    var modal = $(this);
    modal.find('#id_kelurahan').val(id);
    modal.find('#kelurahan').val(kelurahan);
    modal.find('#kecamatan').val(kecamatan);
    modal.find('#kota').val(kota);
});
</script> --}}
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush
