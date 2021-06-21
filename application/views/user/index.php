<div class="container mt-5">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row justify-content-center">
        <?php foreach ($user as $row) { ?>
            <div class="col-md-4 mt-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row->nama; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $row->role; ?></h6>
                        <p class="card-text">Username : <?= $row->username; ?></p>
                        <p class="card-text">Registered on. <?= date("Y-m-d H:i:s", $row->tgl_registrasi); ?></p>
                        <a href="<?= base_url('user/edit_user/' . $row->id_user); ?>" style="text-decoration: none;" class="card-link badge bg-warning">Edit User</a>
                        <a href="<?= base_url('user/hapus_user/' . $row->id_user); ?>" style="text-decoration: none;" class="card-link badge bg-danger">Hapus User</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>