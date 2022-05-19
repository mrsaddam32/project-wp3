<?php
// Make function to get covid data from API
$url = "https://data.covid19.go.id/public/api/update.json";
$json = file_get_contents($url);
$data = json_decode($json, true);

$positif = $data['update']['total']['jumlah_positif'];
$sembuh = $data['update']['total']['jumlah_sembuh'];
$dirawat = $data['update']['total']['jumlah_dirawat'];
$meninggal = $data['update']['total']['jumlah_meninggal'];
?>
<div class="p-5 mb-4 rounded-3" style="height: 100vh;">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Welcome To Antaris Hospital</h1>
        <div class="row d-flex">
            <div class="col-md-8 justify-content-center">
                <p><?php if (!empty($this->session->userdata('username'))) { ?>
                <h3 class="fw-bold">Selamat datang, <?= $nama; ?></h3>
            <?php } ?></p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h5 class="alert alert-info">
                    Update covid-19 di Indonesia.
                </h5>
            </div>
            <div class="col-lg-3 col-sm-12 text-white text-center fw-bold">
                <div class="card bg-primary p-3 mb-5 shadow rounded">
                    <div class="card-body p-4">
                        <h4 class="card-title">Positif</h4>
                        <p class="card-text"><?= $positif ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 text-white text-center fw-bold">
                <div class="card bg-success p-3 mb-5 shadow rounded">
                    <div class="card-body p-4">
                        <h4 class="card-title">Sembuh</h4>
                        <p class="card-text"><?= $sembuh ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 text-white text-center fw-bold">
                <div class="card bg-warning p-3 mb-5 shadow rounded">
                    <div class="card-body p-4">
                        <h4 class="card-title">Dirawat</h4>
                        <p class="card-text"><?= $dirawat ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12 text-white text-center fw-bold">
                <div class="card bg-danger p-3 mb-5 shadow rounded">
                    <div class="card-body p-4">
                        <h4 class="card-title">Meninggal</h4>
                        <p class="card-text"><?= $meninggal ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>