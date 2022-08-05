<?php 
   $koneksi = mysqli_connect("localhost", "root", "", "man2_tulungagung");

   if (mysqli_connect_errno()){
      echo "Koneksi database gagal : " . mysqli_connect_error();
   }
?>