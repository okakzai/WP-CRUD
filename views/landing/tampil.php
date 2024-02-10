<div class="container-fluid pt-3">
    <!-- Mulai-Tabel tampil data -->
    <table class="table" id="crud">
        <thead class="bg-dark text-white">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $tampilSemuaData = tampilSemuaData('wp_crud');
            foreach ($tampilSemuaData as $data) {
                $id = $data->id;
                $tampilDataId = tampilDataId('wp_crud', $id);
            ?>
                <tr>
                    <td><?= $no++; ?>.</td>
                    <td><?= $data->nama; ?></td>
                    <td><?= $data->alamat; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- Selesai-Tabel tampil data -->
</div>