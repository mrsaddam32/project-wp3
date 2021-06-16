<div class="container mt-5">
    <a href="<?= base_url('dokter/tambah_data'); ?>" class="btn btn-md btn-primary">Tambah data dokter</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Dokter</th>
                    <th scope="col">Nama Dokter</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis kelamin</th>
                    <th scope="col">Spesialis</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            <?php foreach ($dokter as $row) { ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row->kode_dokter; ?></td>
                        <td><?= $row->nama_dokter; ?></td>
                        <td><?= $row->tgl_lahir; ?></td>
                        <td><?= $row->jenis_kelamin; ?></td>
                        <td><?= $row->spesialis; ?></td>
                        <td>
                            <a href="<?= base_url('dokter/edit_dokter/' . $row->id_dokter); ?>" class="btn btn-sm btn-warning">Edit Dokter</a>
                            <a href="<?= base_url('dokter/hapus_dokter/' . $row->id_dokter); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data dokter ini ?')">Hapus Dokter</a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>