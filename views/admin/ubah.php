<div class="container-fluid pt-3">
    <div class="d-flex align-items-center justify-content-between border-bottom border-dark mb-3 pb-1">
        <h3>Ubah Data</h3>
        <a href="<?= admin_url('admin.php?page=wp-crud'); ?>" class="btn btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
    </div>

    <!-- Mulai-Notifikasi -->
    <?php if (isset($notifikasi)) echo $notifikasi; ?>
    <!-- Selesai-Notifikasi -->
    <div class="row align-items-center justify-content-center">
        <div class="card col-8">
            <div class="card-body">
                <form action="" method="POST">
                    <?php $tampilDataId = tampilDataId('wp_crud', $id); ?>
                    <div class="form-group row d-none">
                        <label class="col-4 col-form-label">ID</label>
                        <input class="col-8 form-control" type="text" name="id" value="<?= $tampilDataId->id; ?>">
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Nama</label>
                        <input class="col-8 form-control" type="text" name="nama" value="<?= $tampilDataId->nama; ?>">
                    </div>
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Alamat</label>
                        <input class="col-8 form-control" type="text" name="alamat" value="<?= $tampilDataId->alamat; ?>">
                    </div>
                    <button type="submit" class="float-right btn btn-primary">Simpan</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>