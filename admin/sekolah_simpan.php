<?php
    include "../config/konfigurasi.php";
    if($_REQUEST['aksi']=='simpan'){
        $sql=mysqli_query($sqlconn,"UPDATE tb_skul SET nmskul='$_REQUEST[nama]', npsn='$_REQUEST[npsn]', nss='$_REQUEST[noss]', skpd='$_REQUEST[skpd]',alamat='$_REQUEST[almt]',desa='$_REQUEST[desa]', kec='$_REQUEST[kec]', kab='$_REQUEST[kab]', prov='$_REQUEST[prov]', kdpos='$_REQUEST[kpos]', web='$_REQUEST[webs]', email='$_REQUEST[imel]' WHERE kdskul='$_REQUEST[kode]'");
        echo "Update Data Berhasil";
    }
?>