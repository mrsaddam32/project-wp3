<div class="container mt-5">
    <a href="<?= base_url('dashboard/cetak_pdf_pasien'); ?>" class="btn btn-danger"><i class="bi bi-file-earmark-pdf"></i> Cetak PDF</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nomor Pendaftaran</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis kelamin</th>
                    <th scope="col">Tanggal Daftar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            <?php foreach ($pasien as $row) { ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row->no_pendaftaran; ?></td>
                        <td><?= $row->nama_pasien; ?></td>
                        <td><?= $row->umur; ?></td>
                        <td><?= $row->tgl_lahir; ?></td>
                        <td><?= $row->jenis_kelamin; ?></td>
                        <td><?= $row->tgl_daftar; ?></td>
                        <td>
                            <a href="<?= base_url('pasien/edit_data/' . $row->id_pasien); ?>" class="btn btn-sm btn-warning"><i class="bi bi-person-check"></i> Edit Pasien</a>
                            <a href="<?= base_url('pasien/hapus_data/' . $row->id_pasien); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="btn btn-sm btn-danger"><i class="bi bi-person-x"></i> Hapus Pasien</a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>