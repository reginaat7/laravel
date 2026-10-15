<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kopdes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .bg-maroon { background-color: #800020 !important; }
        .btn-maroon { background-color: #800020; color: #ffffff; }
        .btn-maroon:hover { background-color: #5c0017; color: #ffffff; }
    </style>
</head>
<body style="background-color: #fafafa;">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-3 bg-white">
                <div class="card-header bg-maroon text-white py-3">
                    <h5 class="mb-0 fw-bold"><i class="fa-solid fa-plus-circle me-2"></i>Formulir Tambah Kopdes</h5>
                </div>
                <div class="card-body p-4">

                    <form action="{{ route('kopdes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Toko Kopdes</label>
                            <input type="text" name="nama_toko_kopdes" class="form-control" placeholder="Masukkan nama toko" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Manajer</label>
                            <input type="text" name="nama_manajer" class="form-control" placeholder="Masukkan nama manajer" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal Berdiri</label>
                            <input type="date" name="tanggal_berdiri" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Foto Kopdes</label>
                            <input type="file" name="foto_kopdes" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('kopdes.index') }}" class="btn btn-secondary">
                                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-maroon fw-bold">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Data
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>