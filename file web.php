Route::get('/', function () {
    return view('welcome');
});
Route::get('/pertemuan2', function () {
    $nama = 'Neza Khairunnisa Rahmah'; // ganti dengan nama kamu sendiri
    $nilai = [60, 55, 90, 70, 85];     // ubah jadi 5 nilai integer sesuai keinginan

    $jumlah = 0;
    foreach ($nilai as $n) {
        $jumlah += $n;
    }
    $rataRata = $jumlah / count($nilai);

    if ($rataRata >= 75) {
        $status = 'Lulus';
    } else {
        $status = 'Perlu Perbaikan';
    }

    return view('pertemuan2', [
        'nama' => $nama,
        'nilai' => $nilai,
        'rataRata' => $rataRata,
        'status' => $status,
    ]);
});

Route::get('/pertemuan3', function () {
    return view('pertemuan3');
});

Route::post('/pertemuan3', function (\Illuminate\Http\Request $request) {
    // Bersihkan spasi di awal/akhir sebelum validasi
    $request->merge([
        'nama'  => trim($request->input('nama', '')),
        'email' => trim($request->input('email', '')),
        'usia'  => trim($request->input('usia', '')),
        'nim'   => trim($request->input('nim', '')),
    ]);

    $validated = $request->validate([
        'nama'  => 'required|string|max:255',
        'email' => 'required|email',
        'usia'  => 'required|integer|min:1|max:120',
        'nim'   => ['required', 'regex:/^[0-9]{8,12}$/'],
    ], [
        'nama.required'  => 'Nama wajib diisi.',
        'nama.max'       => 'Nama maksimal 255 karakter.',
        'email.required' => 'Email wajib diisi.',
        'email.email'    => 'Format email tidak valid.',
        'usia.required'  => 'Usia wajib diisi.',
        'usia.integer'   => 'Usia harus berupa angka.',
        'usia.min'       => 'Usia tidak valid.',
        'usia.max'       => 'Usia tidak valid.',
        'nim.required'   => 'NIM wajib diisi.',
        'nim.regex'      => 'NIM harus berupa angka 8-12 digit.',
    ]);

    // Sanitasi output agar aman dari tag HTML/XSS
    $namaAman  = strip_tags($validated['nama']);
    $emailAman = strip_tags($validated['email']);

    return view('pertemuan3', [
        'success' => true,
        'nama'  => $namaAman,
        'email' => $emailAman,
        'usia'  => $validated['usia'],
        'nim'   => $validated['nim'],
    ]);
});
