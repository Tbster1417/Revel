<?php

session_start();

if(isset($_POST['login'])){

    $dbServername = "sql3.freemysqlhosting.net";
    $dbuserNamename = "sql3221382";
    $dbpassword = "GCmUk2rZ7Q";
    $dbname = "sql3221382";

    $mysqli = new mysqli("sql3.freemysqlhosting.net", "sql3221382", "GCmUk2rZ7Q", "sql3221382");
    $conn = mysqli_connect($dbServername, $dbuserNamename, $dbpassword, $dbname);
    
    $uid = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);



    if(empty($uid) or empty($pwd)){
    	echo "Fields cannot be left blank.";
    }
    else{
    	$sql = "SELECT * FROM users WHERE user_uName = '$uid'";
    	$result = mysqli_query($conn, $sql);
    	$resultcheck = mysqli_num_rows($result);
    	if($resultcheck < 1){
    		echo "Invalid username";
    	}
    	else{
    		if($row = mysqli_fetch_assoc($result)){
    			$encryptedpwdcheck = password_verify($pwd, $row['user_pwd']);
    			if($encryptedpwdcheck == false){
    				echo "Password is incorrect";
    			}
    			elseif($encryptedpwdcheck == true){
    				$_SESSION['u_id'] = $row['user_id'];
    				$_SESSION['u_first'] = $row['user_first'];
    				$_SESSION['u_last'] = $row['user_last'];
    				$_SESSION['u_email'] = $row['user_email'];
    				$_SESSION['u_uid'] = $row['user_uName'];
    				header("Location: ../index.php");
    				exit();
    			}
    		}
    	}
    }
}


else{
	fopen('../index.php?index=error');
	exit();
}
?>
