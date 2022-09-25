<?php

    function base_url(){
        $URl_host = 'https://'.$_SERVER['HTTP_HOST'].'/';
        return $URl_host;
    }

    function redirect($param){
        $redirect = "<script>document.location.href='".base_url().$param."'</script>";
        echo $redirect;
    }

    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
    }

    function rupiah_edit($angka){
        $hasil_rupiah = number_format($angka);
        return $hasil_rupiah;
    }

    function success_message(){
        if(isset($_SESSION['success'])){
            echo '
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> success!</h4>   
                    Data Berhasil Di'.$_SESSION['success'].' !
                </div>            
            ';
            unset($_SESSION['success']);
        }
    }

    function error_message(){
        if(isset($_SESSION['error'])){
            echo '
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4> 
                    Data Gagal Di'.$_SESSION['error'].' !   
                </div>           
            ';
            unset($_SESSION['error']);
        }
    }

?>