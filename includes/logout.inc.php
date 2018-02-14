<?php
if(isset($_POST['signout'])){
	/*session_destroy('u_id');
	session_destroy('u_first');
	session_destroy('u_last');
	session_destroy('u_uid');
	session_destroy('u_email');*/
	session_start();
    $_SESSION = array();
    session_destroy();
	header('Location: ../index.php');
}
?>