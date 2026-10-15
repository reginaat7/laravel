<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kopdes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .bg-maroon-dark { background-color: #67001a !important; }
        .btn-maroon { background-color: #800020; color: #ffffff; }
        .btn-maroon:hover { background-color: #5c0017; color: #ffffff; }
    </style>
</head>
<body style="background-color: #fafafa;">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-3 bg-white">
                <div class="card-header bg-maroon-dark text-white py-3">
                    <h5 class="mb-0 fw-bold"><i class="fa-solid fa-pen-to-square me-2"></i>Edit Data Kopdes</h5>
                </div>
                <div class="card-body p-4">

                    <form action="{{ route('kopdes.update', $kopdes->id_kopdes) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Toko Kopdes</label>
                            <input type="text" name="nama_toko_kopdes" class="form-control" value="{{ $kopdes->nama_toko_kopdes }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Manajer</label>
                            <input type="text" name="nama_manajer" class="form-control" value="{{ $kopdes->nama_manajer }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ $kopdes->alamat }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal Berdiri</label>
                            <input type="date" name="tanggal_berdiri" class="form-control" value="{{ $kopdes->tanggal_berdiri }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold d-block">Foto Saat Ini</label>
                            @if($kopdes->foto_kopdes)
                                <img src="{{ asset('storage/' . $kopdes->foto_kopdes) }}" class="rounded shadow-sm mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                            @else
                                <p class="text-muted small">Belum ada foto.</p>
                            @endif
                            <label class="form-label fw-bold">Ganti Foto (Opsional)</label>
                            <input type="file" name="foto_kopdes" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('kopdes.index') }}" class="btn btn-secondary">
                                <i class="fa-solid fa-arrow-left me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-maroon fw-bold">
                                <i class="fa-solid fa-arrows-rotate me-1"></i> Update Data
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