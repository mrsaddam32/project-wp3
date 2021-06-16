<div class="container mt-5">
    <div class="row">
        <?= validation_errors(); ?>
        <form action="" method="POST" class="form-group">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" name="nama_obat" id="exampleFormControlInput1" placeholder="Masukkan Nama..">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Stok Obat</label>
                <input type="number" class="form-control" name="stok" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Satuan</label>
                <select class="form-control" id="satuan" name="satuan">
                    <option value="">Pilih Satuan</option>
                    <option value="Kaplet">Kaplet</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Pil">Pil</option>
                    <option value="Syrup">Syrup</option>
                    <option value="Cream">Cream</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Tambah data</button>
        </form>
    </div>
</div>