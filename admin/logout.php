<?php 
include "../config/konfigurasi.php";
$tgl = date("H:i:s");
if(isset($_COOKIE['c_user'],$_COOKIE['c_login'])){
$user = $_COOKIE['c_user'];
$login=$_COOKIE['c_login'];
}

if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $user = trim($parts[0]);
        $login= trim($parts[1]);
        setcookie($user, '', time()-1000);
        setcookie($login, '', time()-1000, '/');
		setcookie("c_user", '', time()-1000);
        setcookie("c_login", '', time()-1000);	
    	unset($_COOKIE['c_user']);
        unset($_COOKIE['c_login']);
    	setcookie('c_user', '', time() - 3600, '/');
        setcookie('c_login', '', time() - 3600, '/'); 
    }
}


header('location:login.php');

?>
<script>
    function disableBackButton() {
        window.history.forward();
    }
    setTimeout("disableBackButton()", 0);
</script>