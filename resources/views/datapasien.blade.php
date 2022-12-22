@extends('layout.admin')
@push('css')
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pasien</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Pasien</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container ml-3 mr-2 ">
    <a href="/tambahPasien" class="btn btn-success">Tambah +</a>
    {{-- {{ Session::get('halaman_url')}} --}}
    <div class="row g-3 align-items-center mb-2 mt-2">  
      <div class="col-auto">
        <form action="/pasien" method="GET">
          <div class="input-group input-group-sm">
            <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
      </form>
      </div>
    </div>
    <div class="row">
     {{-- @if ($message = Session::get('success'))
     <div class="alert alert-success" role="alert">
       {{ $message }}
      </div>
     @endif --}}
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Keluhan</th>
                <th scope="col">Riwayat Penyakit</th>
                <th scope="col">No.Hp</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Aksi</th>
  
              </tr>
            </thead>
            <tbody>
                @php
                @endphp
                @foreach ($data as $index=>$row)
                    <tr>
                    <th scope="row">{{ $index + $data-> firstItem() }}</th>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->tglLahir }}</td>
                    <td>{{ $row->jenisKelamin }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->keluhan }}</td>
                    <td>{{ $row->riwayatPenyakit }}</td>
                    <td>{{ $row->nohp }}</td>
                    <td>{{ $row->created_at->format('d M Y') }}</td>
                    <td>
                            <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                             <a href="#" class="btn btn-danger delete"  data-id="{{ $row->id }}" data-nama ="{{ $row->nama }}" >Delete</a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
<script>
$('.delete').click(function() {
  var pasienid = $(this).attr('data-id');
  var nama = $(this).attr('data-nama');

  swal({
      title: "Apakah Yakin?",
      text: "Kamu akan menghapus data pasien dengan id " + pasienid + " dengan nama " + nama + "!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/delete/" + pasienid + "dengan nama " + nama + ""
        swal("Data berghasil dihapus!", {
          icon: "success",
        });
      } else {
        swal("Data tidak jadi dihapus");
      }
    });
});
</script>
<script>
@if(Session::has('success'))
toastr.success("{{ Session::get('success') }}")
@endif
</script>
@endpush