@extends('layout.admin')
@section('content')
<body>
    <h1 class="text-center mb-5 mt-5">Edit Data Pegawai</h1>
    <div class="container mb-5">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
                <div class="card-body">     
                    <form action="/updatedataPegawai/{{$data->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nama }}">
                            
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tglLahir" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->tglLahir }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                              <option selected>{{$data->jenisKelamin }}</option>
                              <option value="laki-laki">laki-laki</option>
                              <option value="perempuan">perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" aria-label="With textarea">{{ $data->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
                            <select class="form-select" name="pekerjaan" aria-label="Default select example">
                              <option selected>{{$data->pekerjaan }}</option>
                              <option value="dokter">Dokter</option>
                              <option value="bidan">Bidan</option>
                              <option value="perawat">Perawat</option>
                              <option value="staf">Staf</option>
                              
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">No Hp</label>
                            <input type="text" name="nohp" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->nohp }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ $data->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Masukan Foto</label>
                            <input type="file" name="foto" class="form-control" value="{{ $data->foto }}">
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
          </div>



        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>   
@endsection
