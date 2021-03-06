<div class="container mt-5">
    <h3>Laporan Data Pasien</h3>
    <div class="table-responsive">
        <table class="table" border="1" width="100%">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nomor Pendaftaran</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis kelamin</th>
                    <th scope="col">Tanggal Daftar</th>
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
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>