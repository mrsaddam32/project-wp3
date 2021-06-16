<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/fonts.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Antaris Hospital | <?= $title; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">Antaris Hospital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php if (!empty($this->session->userdata('username'))) { ?>
                <div class="collapse navbar-collapse text-uppercase" id="navbarNavDropdown">
                    <ul class="navbar-nav fw-bold">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="<?= base_url(); ?>"><i class="bi bi-house-door-fill"></i> Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-folder2-open"></i> Master Data
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?= base_url('user'); ?>">Data User</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('dashboard/daftar_dokter'); ?>">Data Dokter</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('dashboard/daftar_pasien'); ?>">Data Pasien</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('dashboard/daftar_obat'); ?>">Data Obat</a></li>
                            </ul>
                        </li>
                    </ul>
                    <a class="btn btn-sm btn-primary ms-auto" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            <?php } else { ?>
                <div class="collapse navbar-collapse text-uppercase" id="navbarNavDropdown">
                    <ul class="navbar-nav fw-bold">
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="<?= base_url(); ?>"><i class="bi bi-house-door-fill"></i> Home</a>
                        </li>
                    </ul>
                    <a class="float-end" href="<?= base_url('pasien/register'); ?>">Register/Login ?</a>
                    <a class="btn btn-sm btn-primary ms-auto" href="<?= base_url('auth/login'); ?>">Login</a>
                </div>
            <?php } ?>
        </div>
    </nav>