<?php 
/* Menghubungkan ke database */
$conn = mysqli_connect('localhost', 'root', '','ukl_laundry');

/* Cek Error  */
if(mysqli_connect_errno()){
    /* mengembalikan kode kesalahan dari kesalahan koneksi terakhir, jika ada. */
    printf("Connect failed: %n", mysqli_connect_error());
}  

?>
