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
          <a class="nav-link" href="{{ route('hospital.list') }}">Data Rumah Sakit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('patient.list') }}">Data Pasien</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <h2 class="mb-4">Data Pasien</h2>

    <div class="row mb-3">
        <div class="col-md-6">
            <select id="hospitalFilter" class="form-select">
                <option value="">Semua Rumah Sakit</option>
                @foreach($hospitals as $hospital)
                    <option value="{{ $hospital->id }}">{{ $hospital->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 text-end">
            <a href="{{ route('patient.form.create') }}" class="btn btn-success">+ Create</a>
        </div>
    </div>


    <table class="table table-bordered table-hover bg-white">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Rumah Sakit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="patientTable">
            @foreach($patients as $patient)
            <tr id="patient-{{ $patient->id }}">
                <td>{{ $loop->iteration }}</td> 
                <td>{{ $patient->nama }}</td>
                <td>{{ $patient->alamat }}</td>
                <td>{{ $patient->no_telepon }}</td>
                <td>{{ $patient->hospital->nama ?? '-' }}</td>
                <td>
                    <div class="d-flex gap-1">
                        <a href="{{ route('patient.form.update',  $patient->id) }}" class="btn btn-primary btn-sm">Update</a>
                        <button class="btn btn-danger btn-sm delete-patient" data-id="{{ $patient->id }}">Delete</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
$(document).ready(function(){
    $(document).on("click", ".delete-patient", function() {
        if (!confirm("Apakah Anda yakin ingin menghapus data ini?")) return;

        var id = $(this).data("id");
        var token = '{{ csrf_token() }}';

        $.ajax({
            url: '/patient/' + id,
            type: 'DELETE',
            data: {_token: token},
            success: function(response) {
                $("#patient-" + id).remove();
                alert('Data berhasil dihapus!');
            },
            error: function(xhr) {
                alert('Terjadi kesalahan saat menghapus data.');
            }
        });
    });

    $("#hospitalFilter").change(function() {
        var hospital_id = $(this).val();
        var token = '{{ csrf_token() }}';

        $.ajax({
            url: '{{ route("patient.filter") }}',
            type: 'POST',
            data: {
                _token: token,
                hospital_id: hospital_id
            },
            success: function(response) {
                $("#patientTable").html(response);
            },
            error: function(xhr) {
                alert('Terjadi kesalahan saat memfilter data.');
            }
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
