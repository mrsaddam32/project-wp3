<div class="container mt-5">
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
                            <a href="#" class="btn btn-sm btn-warning">Edit Pasien</a>
                            <a href="#" class="btn btn-sm btn-danger">Hapus Pasien</a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>