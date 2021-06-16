<div class="container mt-5">
    <div class="row">
        <?= validation_errors(); ?>
        <form action="" method="POST" class="form-group">
            <input type="hidden" name="id_obat" id="id_obat" value="<?= $obat['id_obat'] ?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" value="<?= $obat['nama_obat'] ?>" readonly name="nama_obat" id="exampleFormControlInput1" placeholder="Masukkan Nama..">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Stok Obat</label>
                <input type="number" class="form-control" name="stok" value="<?= $obat['stok'] ?>" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Satuan</label>
                <select class="form-control" id="satuan" name="satuan">
                    <?php foreach ($satuan as $row) : ?>
                        <?php if ($row == $obat['satuan']) : ?>
                            <option value="<?= $row; ?>" selected><?= $row; ?></option>
                        <?php else : ?>
                            <option value="<?= $row; ?>"><?= $row; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Edit data</button>
        </form>
    </div>
</div>