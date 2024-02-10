<?php
// Mulai-Tampil semua data
function tampilSemuaData($nama_table)
{
    global $wpdb;
    $table_name = $wpdb->prefix . $nama_table;
    $sql = "SELECT * FROM " . $table_name;
    $query = $wpdb->get_results($sql);
    return $query;
}
// Selesai-Tampil semua data

// Mulai-Tampil data berdasarkan id
function tampilDataId($nama_table, $id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . $nama_table;
    $sql = "SELECT * FROM " . $table_name . " WHERE id=" . $id;
    $query = $wpdb->get_row($sql);
    return $query;
}
// Selesai-Tampil data berdasarkan id

// Mulai-Tambah data
function tambahData($nama_table, $data = array())
{
    global $wpdb;
    $table_name = $wpdb->prefix . $nama_table;
    $wpdb->insert($table_name, $data);
    $id_insert = $wpdb->insert_id;
    return $id_insert;
}
// Selesai-Tambah data

// Mulai-Ubah data
function ubahData($nama_table, $data = array(), $where = array())
{
    global $wpdb;
    $table_name = $wpdb->prefix . $nama_table;
    $update = $wpdb->update($table_name, $data, $where);
    return $update;
}
// Selesai-Ubah data

// Mulai-Hapus data
function hapusData($nama_table, $where = array())
{
    global $wpdb;
    $table_name = $wpdb->prefix . $nama_table;
    $delete = $wpdb->delete($table_name, $where);
    return $delete;
}
// Selesai-Hapus data