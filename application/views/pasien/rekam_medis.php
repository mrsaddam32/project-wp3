<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Antaris Hospital | <?= $title; ?></title>
    <style>
        body {
            background-color: #ddd;
        }

        .card {
            border: none;
            border-radius: 5px;
            background: white;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.15), 0 10px 10px rgba(0, 0, 0, 0.10);
            padding: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('pasien/myProfile'); ?>">Antaris Hospital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-uppercase" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-white" aria-current="page" href="<?= base_url('pasien/myProfile'); ?>"><i class="bi bi-house-door-fill"></i> Home</a>
                    <a class="nav-link text-white" href="<?= base_url('pasien/rekam_medis') ?>">Rekam Medis</a>
                </div>
                <a class="btn btn-sm btn-primary ms-auto" href="<?= base_url('pasien/logout'); ?>">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body fw-bold">
                        <h3 class="card-title"><?= $nama_pasien; ?></h3>
                        <h5 class="card-title">Nama Dokter : <?= $nama_dokter; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Nomor Pendaftaran : <?= $this->session->userdata('no_pendaftaran'); ?></h6>
                        <h6 class="card-subtitle mb-2 text-muted">Nomor Rekamedis : <?= $no_rmdk; ?></h6>
                        <p class="card-text">Keluhan : <?= $keluhan; ?></p>
                        <p class="card-text">Diagnosa : <?= $diagnosa; ?></p>
                        <p class="card-text">Tanggal Rekamedis : <?= $tgl_rmdk; ?></p>
                        <p class="card-text">Obat yang diberikan : <?= $nama_obat; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>