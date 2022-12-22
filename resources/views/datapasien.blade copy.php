<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Pasien</title>
</head>

<body>
  <h1 class="text-center mb-4">Data Pasien</h1>
  <div class="container">
    <a href="/tambahPasien" class="btn btn-success mb-2">Tambah +</a>
    <div class="row g-3 align-items-center mt-2">
      <div class="col-auto">
        <form action="/pasien" method="GET">
          <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
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
        $no = 1;
        @endphp
        @foreach ($data as $row)
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td>{{ $row->nama }}</td>
          <td>{{ $row->tglLahir }}</td>
          <td>{{ $row->jenisKelamin }}</td>
          <td>{{ $row->alamat }}</td>
          <td>{{ $row->keluhan }}</td>
          <td>{{ $row->riwayatPenyakit }}</td>
          <td>{{ $row->nohp }}</td>
          <td>{{ $row->created_at->format('D M Y') }}</td>
          <td>
            <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  </div>

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
        text: "Kamu akan menghapus data pegawai dengan id " + pasienid + " dengan nama " + nama + "!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/deletePegawai/" + pasienid + "dengan nama " + nama + ""
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

</html>