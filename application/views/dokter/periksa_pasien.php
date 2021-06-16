<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/fonts.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Antaris Hospital | <?= $title; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('dokter/myProfile'); ?>">Antaris Hospital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-uppercase" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-white" aria-current="page" href="<?= base_url('dokter/myProfile'); ?>"><i class="bi bi-house-door-fill"></i> Home</a>
                    <a class="nav-link text-white" href="<?= base_url('dokter/periksa_pasien') ?>">Periksa Pasien</a>
                </div>
                <a class="btn btn-sm btn-primary ms-auto" href="<?= base_url('dokter/logout'); ?>">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="table-responsive">
            <?php $this->session->flashdata('pesan'); ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nomor Pendaftaran</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis kelamin</th>
                        <th scope="col">Keluhan</th>
                        <th scope="col">Tanggal Daftar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <?php $i = 1; ?>
                <?php foreach ($pasien as $row) { ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $row->no_pendaftaran; ?></td>
                            <td><?= $row->nama_pasien; ?></td>
                            <td><?= $row->umur; ?></td>
                            <td><?= $row->tgl_lahir; ?></td>
                            <td><?= $row->jenis_kelamin; ?></td>
                            <td><?= $row->keluhan; ?></td>
                            <td><?= $row->tgl_daftar; ?></td>
                            <td>
                                <a href="<?= base_url('dokter/rekam_medis/' . $row->id_pasien) ?>" class="btn btn-sm btn-success">Rekam Medis</a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
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