<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>RSPB</title>

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('img/pertamedika-logo.png') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-gradient-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="{{ asset('img/rspb-logo.png') }}" width="200px" alt="RSPB"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item px-3">
                        <a class="nav-link text-white fw-bolder h5 mb-0" href="#doctor-schedule">Jadwal Dokter</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-white fw-bolder h5 mb-0" href="#contact">Kontak</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-white fw-bolder h5 mb-0" href="{{ route('dashboard') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Alert Success -->
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Alert Error -->
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Danger:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Header -->
    <div class="home row col-md-12 justify-content-center mx-auto py-5">
        <div class="col-md-11 text-center">
            <img src="{{ asset('img/ihc-logo.png') }}" alt="IHC" width="40%" class="">

            <h1 class="py-5 fw-bolder text-black text-shadow">
                Selamat Datang di Rumah Sakit Pertamina Balikpapan
            </h1>

            <h2 class="text-black fw-bolder">
                Silahkan Pilih Jenis Kunjungan Terlebih Dahulu.
            </h2>
        </div>

        <div class="col-md-6 py-5 d-flex justify-content-md-end justify-content-center">
            <button type="button" class="btn btn-success text-white shadow-lg" data-bs-toggle="modal" data-bs-target="#newPatient">
                Pasien Baru
            </button>
        </div>

        <div class="col-md-6 py-5 d-flex justify-content-md-start justify-content-center">
            <a href="{{ route('dashboard') }}">
                <button type="button" class="btn btn-success text-white shadow-lg">
                    Pasien Lama
                </button>
            </a>
        </div>
    </div>

    <!-- Form Registration -->
    <div class="modal fade" id="newPatient" tabindex="-1" aria-labelledby="newPatientLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-success">
                    <h5 class="modal-title text-white" id="newPatientLabel">Registrasi Pasien</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form role="form" action="{{ route('registration') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-md-12 modal-body">
                        <div class="col-md-12">
                            <h5 class="mb-0 fw-bold">Data Diri</h5>
                            <hr class="my-2">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input autocomplete="off" required type="text" class="form-control" id="nama" name="name" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Kewarganegaraan</label>
                            <select autocomplete="off" required class="form-control" name="citizen">
                                <option hidden>Pilih Kewarganegaraan</option>
                                <option value="Warga Negara Indonesia">Warga Negara Indonesia</option>
                                <option value="Warga Negara Asing">Warga Negara Asing</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                            <input autocomplete="off" required type="number" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK / No. KTP">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select autocomplete="off" required class="form-control" name="gender">
                                <option hidden>Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="telepon">No. Telepon</label>
                            <input autocomplete="off" required type="number" class="form-control" id="telepon" name="phone_number" placeholder="Masukkan Nomor Telepon">
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="alamat">Alamat</label>
                            <input autocomplete="off" required type="text" class="form-control" id="alamat" name="address" placeholder="Masukkan Alamat">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input autocomplete="off" required type="text" class="form-control" id="tempat_lahir" name="birthplace" placeholder="Masukkan Tempat Lahir">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input autocomplete="off" required type="date" class="form-control" id="tanggal_lahir" name="birthdate">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="family_name">Nama Keluarga</label>
                            <input autocomplete="off" required type="text" class="form-control" id="family_name" name="family_name" placeholder="Masukkan Nama Keluarga">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="family_contact">No. Telepon Keluarga ( Yang Bisa Dihubuungi )</label>
                            <input autocomplete="off" required type="number" class="form-control" id="family_contact" name="family_contact" placeholder="Masukkan Kontak Keluarga">
                        </div>
                        <div class="col-md-12 mt-3">
                            <h5 class="mb-0 fw-bold">Akun Pengguna</h5>
                            <hr class="my-2">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input autocomplete="off" required type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="password">Password</label>
                            <input autocomplete="off" required type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Doctor Schedule -->
    <div id="doctor-schedule" class="doctor-schedule row col-md-12 justify-content-center mx-auto py-5 bg-white">
        <h1 class="text-center text-black fw-bolder pt-5">
            Jadwal Dokter Di Rumah Sakit Pertamina Balikpapan
        </h1>

        <div class="col-md-10 text-center mx-auto">
            <img src="{{ asset('img/doctor-schedule.jpg') }}" alt="Jadwal Dokter" width="100%">
        </div>
    </div>

    <!-- Contact -->
    <div id="contact" class="contact row col-md-12 justify-content-center mx-auto py-4 bg-gradient-info">
        <div class="col-md-12 text-center">
            <img src="{{ asset('img/rspb-logo.png') }}" width="25%" alt="RSPB">
        </div>

        <div class="col-md-12 d-flex justify-content-center py-4">
            <a href="https://twitter.com/RSPERTAMINABpp" target="_blank" class="twitter fab fa-twitter fa-2x bg-white rounded-circle d-flex justify-content-center align-items-center text-center text-decoration-none shadow"></a>

            <a href="https://www.instagram.com/rspertaminabalikpapan/" class="instagram fab fa-instagram fa-2x bg-white rounded-circle d-flex justify-content-center align-items-center text-center text-decoration-none shadow mx-5"></a>

            <a href="https://www.facebook.com/RSPertaminaBalikpapan/" class="facebook fab fa-facebook-f fa-2x bg-white rounded-circle d-flex justify-content-center align-items-center text-center text-decoration-none shadow"></a>
            </a>
        </div>

        <div class="col-md-12 d-flex justify-content-center">
            <a href="tel:0542734020" class="phone-number text-decoration-none h5 fw-normal">
                <i class="fas fa-phone-alt me-3"></i>0542-734020

                <a href="mailto:rspb@rspb.id" class="email text-decoration-none h5 fw-normal mx-5">
                    <i class="fas fa-envelope me-3"></i>rspb@rspb.id
                </a>

                <a href="https://rspb.id/" class="website text-decoration-none h5 fw-normal">
                    <i class="fas fa-globe me-3"></i>rspb.id
                </a>
        </div>

        <div class="col-md-12 d-flex justify-content-center">
            <a href="https://g.page/RSPERTAMINABALIKPAPAN?share" class="address text-decoration-none h5 fw-normal">
                <i class="fas fa-building me-3"></i>Rumah Sakit Pertamina Balikpapan, Jl. Jenderal Sudirman No.1 Balikpapan, Kalimantan Timur
            </a>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer row col-md-12 justify-content-center bg-gradient-success mx-auto py-3">
        <h5 class="text-center mb-0">
            Copyright &copy; {{ date('Y') }} RSPB. All Rights Reserved
        </h5>
    </div>

    <!-- Javascript  -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/511a6ba9e4.js" crossorigin="anonymous"></script>
</body>

</html>