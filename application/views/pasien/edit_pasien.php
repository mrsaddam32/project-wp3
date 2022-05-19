<div class="container mt-5">
    <div class="row">
        <?= validation_errors(); ?>
        <form action="" method="POST" class="form-group">
            <input type="hidden" name="id_pasien" value="<?= $pasien['id_pasien']; ?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Pasien</label>
                <input type="text" class="form-control" value="<?= $pasien['nama_pasien'] ?>" name="nama_pasien" id="exampleFormControlInput1" placeholder="Masukkan Nama..">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" value="<?= $pasien['tgl_lahir'] ?>" readonly name="tgl_lahir" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Keluhan</label>
                <input type="text" class="form-control" value="<?= $pasien['keluhan'] ?>" readonly name="keluhan" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                    <?php foreach ($kategori as $k) : ?>
                        <?php if ($k == $pasien['kategori']) : ?>
                            <option value="<?= $k; ?>" selected><?= $k; ?></option>
                        <?php else : ?>
                            <option value="<?= $k; ?>"><?= $k; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Umur</label>
                <input type="numeric" class="form-control" value="<?= $pasien['umur'] ?>" readonly name="umur" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                    <?php foreach ($jenis_kelamin as $j) : ?>
                        <?php if ($j == $pasien['jenis_kelamin']) : ?>
                            <option value="<?= $j; ?>" selected><?= $j; ?></option>
                        <?php else : ?>
                            <option value="<?= $j; ?>"><?= $j; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Ubah data</button>
        </form>
    </div>
</div>