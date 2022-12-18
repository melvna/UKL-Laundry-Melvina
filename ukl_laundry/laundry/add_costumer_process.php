<?php
    if($_POST){
    require "connection.php";

    $nama_costumer = strtolower(stripslashes($_POST["nama_costumer"]));
    $alamat = strtolower(stripslashes($_POST["alamat"]));
    $telp = strtolower(stripslashes($_POST["telp"]));
    $gender = strtolower(stripslashes($_POST["gender"]));
    $id_outlet = strtolower(stripslashes($_POST["id_outlet"]));
    /*strtolower : mengubah huruf menjadi kecil semua
    stripslashes : menghapus atau menghilangkan tanda garis miring*/

    $result = mysqli_query($conn, "SELECT nama_costumer FROM costumer WHERE nama_costumer = '$nama_costumer'");
    /*hasil menjalankan intruksi sql dikoneksikan untuk memlih semua data nama costumer dari costumer dimana nama costumer ada */

    if( mysqli_fetch_assoc($result)){
        echo "<script>
            alert('nama_costumer sudah terdaftar!');
            location.href='add_costumer.php';
            </script>";
            return false; /*mengulang jika salah */
    }   
    /*hasil object yang dihasilkan akan menampilkan tulisan "nama costumer sudah terdaftar" dari proses add_costumer */

    /* enkripsi password */
        $insert=mysqli_query($conn,"INSERT INTO costumer(id_outlet, nama_costumer, alamat, telp, gender) value ('".$id_outlet."','".$nama_costumer."','".$alamat."','".$telp."','".$gender."')") or die(mysqli_error($conn));
        /* menjalankan intruksi ke sql dikoneksikan unuk menambah costumer termasuk id_outlet, nama_costumer, alamat, telp, gender dan menmbahkan nilai jika tidak maka datanya akan mati/hilang */
        if($insert){
                echo "<script>alert('Sukses menambahkan costumer');location.href='view_costumer.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan costumer');location.href='add_costumer.php';</script>";
            } 

        }

    
?>