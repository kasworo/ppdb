<?php
    if (!function_exists('getuserid')) {
        function getuserid()  {
            include "../config/konfigurasi.php";
            $cekskul=mysqli_query($sqlconn, "SELECT kdskul FROM tb_skul");
            $cek=mysqli_fetch_array($cekskul);
            $kdskul=$cek['kdskul'];
            $sql=mysqli_query($sqlconn,"SELECT COUNT(*) as juser FROM tb_user");
            $row=mysqli_fetch_array($sql);
            $id=$row['juser']+1;
            if($id<8)
            {
                $cekdigit=10-($id%9+1);
            }
            else
            {
                $cekdigit=10-($id%8+1);
            }
            $iduser='G'.substr('00'.$id,-3).$cekdigit;
           return $iduser;
        }
    }
?>