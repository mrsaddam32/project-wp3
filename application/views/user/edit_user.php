<div class="container mt-5">
    <div class="row">
        <?= validation_errors(); ?>
        <form action="" method="POST" class="form-group">
            <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama User</label>
                <input type="text" class="form-control" value="<?= $user['nama'] ?>" name="nama" id="exampleFormControlInput1" placeholder="Masukkan Nama..">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <input type="text" class="form-control" value="<?= $user['username'] ?>" name="username" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Role</label>
                <input type="text" class="form-control" value="<?= $user['role'] ?>" readonly name="role" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <button class="btn btn-primary" type="submit">Ubah data</button>
            <a href="<?= base_url('user/index') ?>" class="btn btn-info text-white">Kembali</a>
        </form>
    </div>
</div>