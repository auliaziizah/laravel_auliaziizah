<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Update Data Pasien</h2>

    <form action="{{ route('patient.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $patient->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $patient->alamat) }}" required>
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="number" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $patient->no_telepon) }}" required>
        </div>

        <div class="mb-3">
            <label for="id_rumah_sakit" class="form-label">Rumah Sakit</label>
            <select class="form-select" id="id_rumah_sakit" name="id_rumah_sakit" required>
                <option value="">-- Pilih Rumah Sakit --</option>
                @foreach($hospitals as $hospital)
                    <option value="{{ $hospital->id }}" 
                        {{ (old('id_rumah_sakit', $patient->id_rumah_sakit) == $hospital->id) ? 'selected' : '' }}>
                        {{ $hospital->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('patient.list') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
