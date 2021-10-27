<?php
$url = "https://api.kawalcorona.com/indonesia/";
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
$result = json_decode($response, true);
// var_dump($result);
// die;
$positif = $result[0]['positif'];
$meninggal = $result[0]['meninggal'];
$sembuh = $result[0]['sembuh'];
$dirawat = $result[0]['dirawat'];
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
            <div class="col-md-4"><img class="bounce" src="<?= base_url('') ?>assets/images/undraw_medicine_b1ol.svg" alt="" width="100%"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5 class="alert alert-info">
                    Update covid-19 di Indonesia.
                </h5>
            </div>
            <div class="col-md-3 text-white text-center fw-bold">
                <div class="card bg-primary p-3 mb-5 shadow rounded">
                    <div class="card-body p-4">
                        <h4 class="card-title">Positif</h4>
                        <p class="card-text"><?= $positif ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-white text-center fw-bold">
                <div class="card bg-success p-3 mb-5 shadow rounded">
                    <div class="card-body p-4">
                        <h4 class="card-title">Sembuh</h4>
                        <p class="card-text"><?= $sembuh ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-white text-center fw-bold">
                <div class="card bg-warning p-3 mb-5 shadow rounded">
                    <div class="card-body p-4">
                        <h4 class="card-title">Dirawat</h4>
                        <p class="card-text"><?= $dirawat ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-white text-center fw-bold">
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