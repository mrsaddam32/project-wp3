<div class="container mt-5">
    <h3>Laporan Data Obat</h3>
    <div class="table-responsive">
        <table class="table" width="100%" border="1">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Stok</th>
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
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>