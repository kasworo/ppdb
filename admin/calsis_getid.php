<?php
    function getNopend(){
        include "../config/konfigurasi.php";
        $kdthpel = $_COOKIE['c_tahun'];
        $sql0=mysqli_query($sqlconn, "SELECT count(*) as jml FROM tb_calsis WHERE kdthpel='$_COOKIE[c_tahun]'");
        $d0=mysqli_fetch_array($sql0);
        $urut=$d0['jml']+1;
        if($urut>9)
        {
            $urt=substr('000'.$urut,1,4);
        }
        else
        {
            $urt=substr('000'.$urut,0,4);	
        }
        return "PSB".$kdthpel.$urt;
    }
?>