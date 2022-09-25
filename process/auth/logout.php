<?php 
    include_once('../../library/helper.php');
    // mengaktifkan session
    session_start();
    
    // menghapus semua session
    session_destroy();
    
    // mengalihkan halaman sambil mengirim pesan logout
    redirect('auth');
?>