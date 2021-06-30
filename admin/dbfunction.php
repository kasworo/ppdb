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

    function getskul(){
        global $conn;
        $sql=mysqli_query($conn, "SELECT*FROM tb_skul");
        $row=mysqli_fetch_assoc($sql);
        return $row['kdskul'];
    }

    function getthpel(){
        global $conn;
        $sql=mysqli_query($conn, "SELECT*FROM tb_thpel WHERE aktif='Y'");
        $row=mysqli_fetch_array($sql);
        return $row['kdthpel'];
    }

    function getnomor(){
        global $conn;
        $kdskul=getskul();
        $sql=mysqli_query($conn, "SELECT tp.kdthpel, COUNT(*) as jml FROM tb_calsis cs INNER JOIN tb_thpel tp USING (kdthpel) WHERE tp.aktif='Y' AND cs.kdskul='$kdskul' AND cs.nopend IS NOT ''");
        $row=mysqli_fetch_array($sql);
        $kdthpel=$row['kdthpel'];
        $urut=$row['jml'];
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

    function viewdata($tbl, $col='', $id='', $ord=''){
        global $conn;
        if($col=='' && $id=='' && $ord==''){
            $sql="SELECT*FROM $tbl"; 
        }
        else if($ord=''){
            $sql="SELECT*FROM $tbl WHERE $col='$id'";
        }
        else {
            $sql="SELECT*FROM $tbl WHERE $col = '$id' ORDER BY $ord";
        }
        $result=mysqli_query($conn, $sql);
        $rows=[];
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }
    

    function cekdata($tbl){
        global $conn;
        $sql="SELECT*FROM $tbl";
        $result=mysqli_query($conn, $sql);                
        return mysqli_num_rows($result);
    }

    function query($data){
        global $conn;
        $result=mysqli_query($conn, $data); 
        $rows=[];
        while($row=mysqli_fetch_assoc($result)){
            $rows[]=$row;
        }
        return $rows;
    }

    function addcalsis($data){
        global $conn;
        $kdskul=getskul();
        $kdthpel=getthpel();
        $saiki=date('Y-m-d');
        $nama=mysqli_escape_string($conn,$data['nama']);
        $nik=$data['nik'];
        $nisn=$data['nisn'];
        $tmplahir=$data['tmplahir'];
        $tgllahir=$data['tgllahir'];
        $gender=$data['gender'];
        $agama=$data['agama'];
        $almt=$data['almt'];
        $desa=$data['desa'];
        $kec=$data['kec'];
        $kab=$data['kab'];
        $prov=$data['prov'];
        $kdpos=$data['kdpos'];
        $nohp=$data['nohp'];
        $password=password_hash(str_replace("-","",$tgllahir), PASSWORD_DEFAULT);
        $sql="INSERT INTO tb_calsis (kdskul, kdthpel, nama, nik, nisn, tmplhr, tgllhr, agama, gender, alamat, desa, kec, kab, prov, kdpos, nohp, deleted, tglinput, pwd) VALUES ('$kdskul','$kdthpel', '$nama', '$nik', '$nisn', '$tmplahir','$tgllahir', '$agama', '$gender', '$almt', '$desa', '$kec', '$kab','$prov','$kdpos','$nohp','0', '$saiki','$password')";
        mysqli_query($conn,$sql);
        return mysqli_affected_rows($conn);        
    }

    function isinopend($data){
        global $conn;
        $nisn=$data['nisn'];
        $nik=$data['nik'];
        $nopend=getnomor();
        $sql="UPDATE tb_calsis SET nopend='$nopend' WHERE nisn='$nisn' OR nik='$nik'";
        mysqli_query($conn,$sql);
        return mysqli_affected_rows($conn);
       
    }

    function editcalsis($data){
        global $conn;
        $nisn=$data['nisn'];
        $nik=$data['nik'];
        $nopend=$data['nopend'];
        $sql="UPDATE tbcalsis SET nama='$nama' WHERE nisn='$nisn' OR nik='$nik' OR nopend='$nopend'";
        mysqli_query($conn,$sql);
        return mysqli_affected_rows($conn);       
    }

    function delcalsis($data){
        global $conn;
        
    }

    function fotocalsis($data){
        global $conn;
       
    }
?>