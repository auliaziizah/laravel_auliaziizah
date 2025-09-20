<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="nav nav-underline">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('hospital.list') }}">Data Rumah Sakit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('patient.list') }}">Data Pasien</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <h2 class="mb-4">Data Rumah Sakit</h2>
    <a href="{{ route('hospital.form.create') }}" class="btn btn-success mb-3">+ Create</a>
    <table class="table table-bordered table-hover bg-white">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="hospitalTable">
            @foreach($hospitals as $hospital)
            <tr id="hospital-{{ $hospital->id }}">
                <td>{{ $loop->iteration }}</td> 
                <td>{{ $hospital->nama }}</td>
                <td>{{ $hospital->alamat }}</td>
                <td>{{ $hospital->email }}</td>
                <td>{{ $hospital->telepon }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('hospital.form.update',  $hospital->id) }}" class="btn btn-primary btn-sm">Update</a>
                        <button class="btn btn-danger btn-sm delete-hospital" data-id="{{ $hospital->id }}">Delete</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){
    $(".delete-hospital").click(function() {
        if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) return;

        var id = $(this).data("id");
        var token = '{{ csrf_token() }}';

        $.ajax({
            url: '/hospital/' + id,
            type: 'DELETE',
            data: {_token: token},
            success: function(response) {
                $("#hospital-" + id).remove();
                alert('Data berhasil dihapus!');
            },
            error: function(xhr) {
                alert('Terjadi kesalahan saat menghapus data.');
            }
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
