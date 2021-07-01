<?php 
    session_start();
    $_SESSION=[];
    session_unset();
    session_destroy();
    setcookie('id','',time()-7200);
    unset($_COOKIE['id']);
    header('location:login.php');

?>
<script>
    function disableBackButton() {
        window.history.forward();
    }
    setTimeout("disableBackButton()", 0);
</script>
?>
<script>
    function disableBackButton() {
        window.history.forward();
    }
    setTimeout("disableBackButton()", 0);
</script>