<div class="container-fluid pt-3">
    <div class="d-flex align-items-center justify-content-between border-bottom border-dark mb-3 pb-1">
        <h3>WP CRUD</h3>
        <button data-toggle="modal" data-target="#tambahModal" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
    </div>

    <!-- Mulai-Modal Form Tambah -->
    <div class="modal fade mt-5" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <form action="" method="POST">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Nama</label>
                            <input class="col-9 form-control" type="text" name="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Alamat</label>
                            <input class="col-9 form-control" type="text" name="alamat" placeholder="Masukkan Alamat">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Selesai-Modal Form Tambah -->

    <!-- Mulai-Notifikasi -->
    <?php if (isset($notifikasi)) echo $notifikasi; ?>
    <!-- Selesai-Notifikasi -->

    <!-- Mulai-Tabel tampil data -->
    <table class="table" id="crud">
        <thead class="bg-dark text-white">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
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
                    <td>
                        <a href="<?= admin_url('admin.php?page=wp-crud-ubah') . '&id=' . $id; ?>" class="btn btn-warning text-white mb-1"><i class="fa fa-edit"></i> Ubah</a>
                        <button data-toggle="modal" data-target="#hapusModal<?= $id; ?>" class="btn btn-danger mb-1"><i class="fa fa-trash"></i> Hapus</button>
                    </td>
                </tr>

                <!-- Mulai-Modal Form Hapus -->
                <div class="modal fade mt-5" id="hapusModal<?= $id; ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <form action="" method="POST">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-5">
                                    <input hidden type="text" name="aksi" value="hapus">
                                    <input hidden type="text" name="id" value="<?= $tampilDataId->id; ?>">
                                    <div class="form-group row justify-content-between">
                                        <label class="col-4 col-form-label">Nama</label>
                                        <label class="col-6 col-form-label text-right"><span class="badge badge-primary"><?= $tampilDataId->nama; ?></span></label>
                                    </div>
                                    <div class="form-group row justify-content-between">
                                        <label class="col-4 col-form-label">Alamat</label>
                                        <label class="col-6 col-form-label text-right"><span class="badge badge-primary"><?= $tampilDataId->alamat; ?></span></label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Selesai-Modal Form Hapus -->
            <?php } ?>
        </tbody>
    </table>
    <!-- Selesai-Tabel tampil data -->
</div>