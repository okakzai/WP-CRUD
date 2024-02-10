<?php

/**
 * Function menampilkan shortcode
 * Hook: add_shortcode
 */

add_shortcode('wp-crud', 'tampil');
function tampil()
{
    ob_start();
    // if (cek_domain() == 1) {
    include LANDING_DIR . 'tampil.php';
    // } else {
    //     include LANDING_DIR . 'terlarang.php';
    // }
    return ob_get_clean();
}
