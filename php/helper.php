<?php
// Mulai-Membatasi instalasi WP Plugin hanya untuk 1 domain
function cek_domain()
{
    $domain_real = $_SERVER['HTTP_HOST'];
    if (($domain_real == 'localhost:8080') || ($domain_real == 'localhost')) {
        return 1;
    } else {
        $domain_target = 'wp.majuappz.asia';
        if ($domain_target != $domain_real) {
            return 0;
        } else {
            return 1;
        }
    }
}
// Selesai-Membatasi instalasi WP Plugin hanya untuk 1 domain