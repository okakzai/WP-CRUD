<?php

/**
 * Function menampilkan menu
 * Hook: admin_menu
 */



add_action('admin_menu', 'menu');
function menu()
{
    add_menu_page(
        'WP CRUD', //Page Title
        'WP CRUD', //Menu Title
        'manage_options', //Capability
        'wp-crud', //Slug URL
        'tampil_callback', //Callback
        'dashicons-database', //Menu Icon
    );

    add_submenu_page(
        'wp-crud', //Parent Slug
        'List Data', //Page Title
        'List Data', //Menu Title
        'manage_options', //Capability
        'wp-crud', //Slug URL
        'tampil_callback' //Callback
    );

    add_submenu_page(
        'wp-crud', //Parent Slug
        'Ubah Data', //Page Title
        'Ubah Data', //Menu Title
        'manage_options', //Capability
        'wp-crud-ubah', //Slug URL
        'ubah_callback' //Callback
    );
}

function tampil_callback()
{
    // if (cek_domain() == 1) {
    $aksi = isset($_POST['aksi']) ? $_POST['aksi'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    if ($aksi == 'hapus') {
        // Mulai-Hapus data
        $where = array('id' => $id);
        $hapusData = hapusData('wp_crud', $where);
        if ($hapusData) {
            $notifikasi = '<div class="bg bg-success text-white p-3 mb-3 rounded text-center">Data <span class="text-dark">(id: ' . $id . ')</span> berhasil dihapus!</div>';
        }
        // Selesai-Hapus data
    }

    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    if (!empty($nama) && !empty($alamat)) {
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat
        );
        // Mulai-Tambah data
        $tambahData = tambahData('wp_crud', $data);
        if ($tambahData) {
            $notifikasi = '<div class="bg bg-success text-white p-3 mb-3 rounded text-center">Data baru <span class="text-dark">(id: ' . $tambahData . ')</span> berhasil ditambahkan!</div>';
        }
        // Selesai-Tambah data
    }
    include ADMIN_DIR . 'tampil.php';
    // } else {
    //     include ADMIN_DIR . 'terlarang.php';
    // }
}

function ubah_callback()
{
    // if (cek_domain() == 1) {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if ($id != '') {
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
        if (!empty($nama) && !empty($alamat)) {
            $data = array(
                'nama' => $nama,
                'alamat' => $alamat
            );
            // Mulai-Ubah data
            $where = array('id' => $id);
            $ubahData = ubahData('wp_crud', $data, $where);
            if ($ubahData) {
                $notifikasi = '<div class="bg bg-success text-white p-3 mb-3 rounded text-center">Data <span class="text-dark">(id: ' . $id . ')</span> berhasil diubah!</div>';
            } else {
                $notifikasi = '<div class="bg bg-warning text-white p-3 mb-3 rounded text-center">Data <span class="text-dark">(id: ' . $id . ')</span> tidak ada perubahan!</div>';
            }
            // Selesai-Ubah data
        }
        include ADMIN_DIR . 'ubah.php';
    } else {
        include ADMIN_DIR . 'kosong.php';
    }
    // } else {
    //     include ADMIN_DIR . 'terlarang.php';
    // }
}
