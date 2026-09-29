<!DOCTYPE html>
<html>
<head>
    <title>Pertemuan 3 - Form dan Validasi</title>
</head>
<body>
    <h2>Form Data Mahasiswa</h2>

    @if(isset($success) && $success)
        <p><strong>Data berhasil disimpan:</strong></p>
        <p>Nama: {{ $nama }}</p>
        <p>Email: {{ $email }}</p>
        <p>Usia: {{ $usia }}</p>
        <p>NIM: {{ $nim }}</p>
        <hr>
    @endif

    <form method="POST" action="/pertemuan3">
        @csrf

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}"><br>
        @error('nama') <span>{{ $message }}</span><br> @enderror
        <br>

        <label>Email:</label><br>
        <input type="text" name="email" value="{{ old('email') }}"><br>
        @error('email') <span>{{ $message }}</span><br> @enderror
        <br>

        <label>Usia:</label><br>
        <input type="text" name="usia" value="{{ old('usia') }}"><br>
        @error('usia') <span>{{ $message }}</span><br> @enderror
        <br>

        <label>NIM:</label><br>
        <input type="text" name="nim" value="{{ old('nim') }}"><br>
        @error('nim') <span>{{ $message }}</span><br> @enderror
        <br>

        <button type="submit">Kirim</button>
    </form>
</body>
</html>
