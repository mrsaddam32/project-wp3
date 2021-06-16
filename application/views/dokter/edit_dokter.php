<div class="container mt-5">
    <div class="row">
        <?= validation_errors(); ?>
        <form action="" method="POST" class="form-group">
            <input type="hidden" name="id_dokter" value="<?= $dokter['id_dokter']; ?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Dokter</label>
                <input type="text" class="form-control" value="<?= $dokter['nama_dokter'] ?>" name="nama_dokter" id="exampleFormControlInput1" placeholder="Masukkan Nama..">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" value="<?= $dokter['tgl_lahir'] ?>" readonly name="tgl_lahir" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                    <?php foreach ($jenis_kelamin as $j) : ?>
                        <?php if ($j == $dokter['jenis_kelamin']) : ?>
                            <option value="<?= $j; ?>" selected><?= $j; ?></option>
                        <?php else : ?>
                            <option value="<?= $j; ?>"><?= $j; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Spesialis</label>
                <select class="form-select" aria-label="Default select example" name="spesialis">
                    <?php foreach ($spesialis as $s) : ?>
                        <?php if ($s == $dokter['spesialis']) : ?>
                            <option value="<?= $s; ?>" selected><?= $s; ?></option>
                        <?php else : ?>
                            <option value="<?= $s; ?>"><?= $s; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Ubah data</button>
        </form>
    </div>
</div>