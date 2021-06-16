<div class="container mt-5">
    <div class="row">
        <?= validation_errors(); ?>
        <form action="<?= base_url('dokter/proses_tambah') ?>" method="POST" class="form-group">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Dokter</label>
                <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" placeholder="Masukkan Nama..">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                <select class="form-select" aria-label="Default select example" name="jenis_kelamin">
                    <option selected>Pilih jenis kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Spesialis</label>
                <select class="form-select" aria-label="Default select example" name="spesialis">
                    <option selected>Pilih spesialis</option>
                    <option value="UMUM">UMUM</option>
                    <option value="THT">THT</option>
                    <option value="KULIT & KELAMIN">KULIT & KELAMIN</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Tambah data</button>
            <a href="<?= base_url('dashboard/daftar_dokter'); ?>" class="btn btn-info text-white">Kembali</a>
        </form>
    </div>
</div>