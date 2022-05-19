<div class="container mt-5">
    <a href="<?= base_url('obat/tambah_data'); ?>" class="btn btn-md btn-primary">Tambah data obat</a>
    <a href="<?= base_url('dashboard/cetak_pdf_obat'); ?>" target="_blank" class="btn btn-danger"><i class="bi bi-file-earmark-pdf"></i> Cetak PDF</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            <?php foreach ($obat as $row) { ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row->nama_obat; ?></td>
                        <td><?= $row->satuan; ?></td>
                        <td><?= $row->stok; ?></td>
                        <td>
                            <a href="<?= base_url('obat/edit_obat/' . $row->id_obat); ?>" class="btn btn-sm btn-warning">Edit Obat</a>
                            <a href="<?= base_url('obat/hapus_obat/' . $row->id_obat); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus obat ini ?')">Hapus Obat</a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>