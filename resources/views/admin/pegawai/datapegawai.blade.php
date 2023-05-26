@extends('admin.layout.admin')



@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Data Barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="container">
    	<a href="/tambahpegawai" class="btn btn-secondary">Tambah</a>

		<div class="row g-3 align-items-center mt-2">
	        <div class="col-auto">
	            <form action="/datapegawai" method="GET">
		            <input type="search" id="inputPassword6" name="search" placeholder="Search" class="form-control"
		                        aria-describedby="passwordHelpInline">
		        </form>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <form action="/importexcel" enctype="multipart/form-data"> 
	      	@csrf
	      <div class="modal-body">
	        <div class="form-group">
	        	<input type="file" name="file" required>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	    </form>
	  </div>
	</div>
			</div>

	    </div>
    	<div class="row mt-3">
    	<!-- @if ($message = Session::get('success'))
	    <div class="alert alert-success" role="alert">
	  		{{$message}}
		</div>
		@endif -->
    		<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Nama Barang</th>
				  <th scope="col">Gambar</th>
			      <th scope="col">Harga</th>
				  <th scope="col">Stok</th>
				  <th scope="col">Keterangan</th>
			    </tr>
			  </thead>
			  <tbody>
			  @php
			  	$no = 1;
			  @endphp
			  @foreach ($data as $index => $row)
			    <tr>
			      <th scope="row">{{ $index + $data->firstItem() }}</th>
				  <th >{{ $row->nama_barang }} </th>
				  <th >{{ $row->gambar }} </th>
				  <th >{{ $row->harga }} </th>
				  <th >{{ $row->stok }} </th>
				  <th >{{ $row->keterangan }} </th>
			      <td>
					 <a href="/tampilkandata/{{$row->id}}" class="btn btn-warning">Edit</a>
					 <a href="#" class="btn btn-danger delete" 
					 	data-id="{{$row->id}}" data-nama="{{$row->nama}}" >Delete</a>
				  </td>
			    </tr>
			   @endforeach
			  </tbody>
			</table>
			{{ $data->links() }}
    	</div>
    </div>

</div>
	
@endsection

@push('scripts')
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
    <script>$.fn.poshytip={defaults:null}</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>


  </body>
  <script>
    $('.delete').click(function(){
      var pegawaiid = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');
      swal({
      title: "Yakin?",
      text: "Kamu kan menghapus data data dengan nama "+nama+" ",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/delete/"+pegawaiid+""
        swal("Selamat! Data berhasil dihapus", {
          icon: "success",
        });
      } else {
        swal("Data tidak jadi dihapus");
      }
    });
    });
</script>
<script>
  @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
  @endif
</script>
@endpush