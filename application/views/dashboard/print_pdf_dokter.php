<div class="container mt-5">
    <h3>Laporan Data Dokter</h3>
    <div class="table-responsive">
        <table class="table" border="1" width="100%">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode Dokter</th>
                    <th scope="col">Nama Dokter</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis kelamin</th>
                    <th scope="col">Spesialis</th>
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
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>