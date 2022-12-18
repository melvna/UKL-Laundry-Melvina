<?php 
    if($_POST){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username)){ /*empty : kosong */
            echo "<script>alert('Username tidak boleh kosong');location.href='login.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
        } else {    
            include "connection.php";
            $qry_login=mysqli_query($conn,"select * from user where username = '".$username."' and password = '".md5($password)."'");
            if(mysqli_num_rows($qry_login)>0){ /*jika menampilkan baris lebih dari 0 */
                $dt_login=mysqli_fetch_array($qry_login);
                session_start();
                $_SESSION['id_user']=$dt_login['id_user'];
                $_SESSION['id_outlet']=$dt_login['id_outlet'];
                $_SESSION['nama_user']=$dt_login['nama_user'];
                $_SESSION['username']=$dt_login['username'];
                $_SESSION['telp']=$dt_login['telp'];
                $_SESSION['role']=$dt_login['role'];
                $_SESSION['foto_profile']=$dt_login['foto_profile'];
                $_SESSION['status_login']=true; /*$_SESSION : menjalankan aksi agar bisa dipakai lebih dari 1 halaman, jika tidak memakai $_SESSION tidak bisa dijalankan*/
                /*bisa diakses dimana saja */
                header("location: home.php");
            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
            }
        }
    }
?>