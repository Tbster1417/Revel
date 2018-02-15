<?php
if(isset($_POST['signout'])){
    session_start();
    $_SESSION = array();
    session_destroy();
    header('Location: ../index.php');
}
?>
