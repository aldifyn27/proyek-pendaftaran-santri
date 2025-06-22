<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Santri Baru</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="bg-light">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">

                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="card-title text-center mb-2">Formulir Pendaftaran</h1>
                        <p class="card-subtitle text-center text-muted mb-4">Pondok Pesantren Riyadlut Tauhid</p>
                        
                        <form action="{{ route('pendaftaran.store') }}" method="POST">
                            @csrf <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap Anda" required>
                            </div>

                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN Anda" required>
                            </div>

                            <div class="mb-3">
                                <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Contoh: SMPN 1 Tasikmalaya" required>
                            </div>

                            <div class="mb-3">
                                <label for="jurusan_pilihan" class="form-label">Pilihan Jurusan</label>
                                <select class="form-select" id="jurusan_pilihan" name="jurusan_pilihan" required>
                                    <option value="" selected disabled>-- Pilih Jurusan --</option>
                                    <option value="Tahfidz">Tahfidz</option>
                                    <option value="Kitab Kuning">Kitab Kuning</option>
                                    <option value="Bahasa Arab">Bahasa Arab</option>
                                </select>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Kirim Pendaftaran</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>