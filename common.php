<?php
    $conn=mysqli_connect("localhost","root","password");
    mysqli_select_db($conn,"smpnlipa_ppdb") or die('Error selecting MySQL database: ' . mysqli_error);
    
    function indonesian_date($date)
    {
        $indonesian_month = array("Januari", "Februari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "November", "Desember");
        $year        = substr($date, 0, 4);
        $month       = substr($date, 5, 2);
        $currentdate = substr($date, 8, 2);
        if($month>=1)
        { 
            $result = $currentdate . " " . $indonesian_month[(int) $month - 1] . " " . $year;
        }
        else
        {
            $result = '';
        }
        return $result;
    }

    function umur($tgl_lahir, $tgl_batas)
	{
		$lahir = new DateTime($tgl_lahir);
		$batas = new DateTime($tgl_batas);
		$diff = $batas->diff($lahir);
		return $diff->y." thn ".substr('0'.$diff->m,-2)." bln ".$diff->d ." hari";
	}

    function getskul(){
        global $conn;
        $sql=mysqli_query($conn, "SELECT*FROM tb_skul");
        $row=mysqli_fetch_assoc($sql);
        return $row['kdskul'];
    }

    function getthpel(){
        global $conn;
        $sql=mysqli_query($conn, "SELECT*FROM tb_thpel WHERE aktif='Y'");
        $row=mysqli_fetch_assoc($sql);
        return $row['kdthpel'];
    }

    function getnomor(){
        global $conn;
        $kdskul=getskul();
        $sql=mysqli_query($conn, "SELECT tp.kdthpel, COUNT(*) as jml FROM tb_calsis cs INNER JOIN tb_thpel tp USING (kdthpel) WHERE tp.aktif='Y' AND cs.kdskul='$kdskul' AND cs.nopend IS NOT NULL");
        $row=mysqli_fetch_assoc($sql);
        $kdthpel=$row['kdthpel'];
        
        $urut=$row['jml']+1;
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

    function getidjadwal(){
        global $conn;
        $sql=mysqli_query($conn, "SELECT COUNT(*) as jml, tp.kdthpel FROM tb_jadwal jd INNER JOIN tb_thpel tp ON tp.kdthpel=jd.kdthpel WHERE tp.aktif='Y'");
        $d=mysqli_fetch_assoc($sql);
        $urut=$d['jml']+1;
        $kdthpel=$d['kdthpel'];
        if($urut>9)
        {
            $urt=substr('00'.$urut,1,3);
        }
        else
        {
            $urt=substr('00'.$urut,0,3);	
        }

       return "JD".$kdthpel.$urut;     
    }

    function getbataslahir(){
        global $conn;
        $sql=mysqli_query($conn, "SELECT DATE_ADD(awal, INTERVAL -15 YEAR) as bataslahir FROM tb_thpel WHERE aktif='Y'");
        $row=mysqli_fetch_assoc($sql);
        return $row['bataslahir'];
    }

    function viewdata($tbl, $key='', $id='', $ord=''){
        global $conn;
        if($key=='' && $id=='' && $ord==''){
            $sql="SELECT*FROM $tbl"; 
        }
        elseif($ord==''){
            $sql="SELECT*FROM $tbl WHERE $key='$id'";
        }
        else {
            $sql="SELECT*FROM $tbl WHERE $key = '$id' ORDER BY $ord";
        }
        $result=mysqli_query($conn, $sql);
        $rows=[];
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }    

    function cekdata($tbl,$key='',$id=''){
        global $conn;
        if($key=='' && $id==''){
            $sql="SELECT*FROM $tbl";
        }
        else {
            $sql="SELECT*FROM $tbl WHERE $key='$id'";
        }
        $result=mysqli_query($conn, $sql);                
        return mysqli_num_rows($result);
    }

    function adddata($tbl, $data){
        global $conn;        
        $key = array_keys($data);
        $val = array_values($data);
        $sql = "INSERT INTO $tbl (".implode(', ', $key). ") VALUES ('". implode("', '", $val)."')";
        var_dump($sql);die;
        mysqli_query($conn,$sql);
        return mysqli_affected_rows($conn);
    }

    function editdata($tbl,$data,$colm,$id){
        global $conn;
        $cols = array(); 
        foreach($data as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        $sql = "UPDATE $tbl SET " . implode(', ', $cols). " WHERE $colm='$id'";
        var_dump($sql);die;
        mysqli_query($conn,$sql);
        return mysqli_affected_rows($conn);
    }

    function seleksidata($tbl,$id){
        global $conn;
        $sql="SELECT*FROM $tbl WHERE tgllhr>='$id' ORDER BY tgllhr ASC";
        $result=mysqli_query($conn, $sql);
        $rows=[];
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }
?>