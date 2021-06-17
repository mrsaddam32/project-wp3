<div class="container mt-5">
    <?= $this->session->flashdata('pesan'); ?>
    <a href="<?= base_url('dokter/tambah_data'); ?>" class="btn btn-md btn-primary"><i class="bi bi-person-plus"></i> Tambah data dokter</a>
    <a href="<?= base_url('dashboard/cetak_pdf_dokter'); ?>" class="btn btn-danger"><i class="bi bi-file-earmark-pdf"></i> Cetak PDF</a>
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
                            <a href="<?= base_url('dokter/edit_dokter/' . $row->id_dokter); ?>" class="btn btn-sm btn-warning"><i class="bi bi-person-check"></i> Edit Dokter</a>
                            <a href="<?= base_url('dokter/hapus_dokter/' . $row->id_dokter); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data dokter ini ?')"><i class="bi bi-person-x"></i> Hapus Dokter</a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>