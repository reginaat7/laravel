<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kopdes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .bg-maroon { background-color: #800020 !important; }
        .btn-maroon-light { background-color: #f8f0f2; color: #800020; border: 1px solid #e6cfd5; }
        .btn-maroon-light:hover { background-color: #ebd5db; color: #5c0017; }
        .text-maroon { color: #800020 !important; }
        .border-maroon { border-color: #800020 !important; }
        .table-maroon-header { background-color: #67001a; color: #ffffff; }
        .badge-maroon { background-color: #f8f0f2; color: #800020; border: 1px solid #e6cfd5; }
    </style>
</head>
<body style="background-color: #fafafa;">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <!-- WIDGET RINGKASAN DATA -->
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="p-3 bg-white rounded-3 shadow-sm border-start border-maroon border-4 d-flex align-items-center justify-content-between">
                        <div>
                            <small class="text-muted fw-bold d-block text-uppercase">Total Kopdes Terdaftar</small>
                            <h2 class="mb-0 fw-bold text-maroon">{{ $kopdes->count() }} <span class="fs-6 fw-normal text-muted">Toko</span></h2>
                        </div>
                        <div class="p-3 bg-light rounded-circle text-maroon">
                            <i class="fa-solid fa-store fa-2x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 bg-white rounded-3 shadow-sm border-start border-success border-4 d-flex align-items-center justify-content-between">
                        <div>
                            <small class="text-muted fw-bold d-block text-uppercase">Status Sistem</small>
                            <h4 class="mb-0 fw-bold text-success"><i class="fa-solid fa-circle-check me-1"></i> Aktif & Normal</h4>
                        </div>
                        <div class="p-3 bg-light rounded-circle text-success">
                            <i class="fa-solid fa-server fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD TABLE UTAMA -->
            <div class="card shadow-sm border-0 rounded-3 bg-white">
                <div class="card-header bg-maroon text-white d-flex justify-content-between align-items-center py-3">
                    <h4 class="mb-0 fw-bold"><i class="fa-solid fa-list me-2"></i>Daftar Kopdes</h4>
                    <a href="{{ route('kopdes.create') }}" class="btn btn-maroon-light fw-bold shadow-sm">
                        <i class="fa-solid fa-plus me-1"></i> Tambah Kopdes
                    </a>
                </div>
                <div class="card-body p-4">
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover align-middle border">
                            <thead>
                                <tr class="table-maroon-header">
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Foto</th>
                                    <th>Nama Toko</th>
                                    <th>Manajer</th>
                                    <th>Alamat</th>
                                    <th>Tgl Berdiri</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kopdes as $item)
                                <tr>
                                    <td class="text-center fw-bold">{{ $item->id_kopdes }}</td>
                                    <td class="text-center">
                                        @if($item->foto_kopdes)
                                            <img src="{{ asset('storage/' . $item->foto_kopdes) }}" class="rounded shadow-sm" style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <span class="badge badge-maroon">No Photo</span>
                                        @endif
                                    </td>
                                    <td class="fw-semibold">{{ $item->nama_toko_kopdes }}</td>
                                    <td>{{ $item->nama_manajer }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td><span class="badge badge-maroon">{{ $item->tanggal_berdiri }}</span></td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('kopdes.edit', $item->id_kopdes) }}" class="btn btn-warning btn-sm text-white">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('kopdes.destroy', $item->id_kopdes) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-start-0" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">Belum ada data Kopdes.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>