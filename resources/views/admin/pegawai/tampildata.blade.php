@extends('admin.layout.admin')
@section('content')
<body>
	<br>
	<br>
    <h1 class="text-center mb-5 mt-5">Edit Data Pegawai</h1>

    <div class="container mb-5">
    	<div class="row justify-content-center">
    		<div class="col-8">
    			<div class="card">
	    			<div class="card-body">
	    				<form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
	    				  @csrf
						  <div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
						    <input type="text" name="nama_barang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nama_barang}}">
						  </div>
						  <div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Gambar</label>
						    <input type="text" name="gambar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->gambar}}">
						  </div>
						  <div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Harga</label>
						    <input type="text" name="harga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->harga}}">
						  </div>
						  <div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Stok</label>
						    <input type="text" name="stok" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->stok}}">
						  </div>
						  <div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Keterangan</label>
						    <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->keterangan}}">
						  </div>
						  <button type="submit" class="btn btn-primary">Simpan</button>
						</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>

@endsection