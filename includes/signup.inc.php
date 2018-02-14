<?php

if(!isset($_POST['sumbit'])){

    $dbServername = "localhost";
    $dbuserNamename = "root";
    $dbpassword = "";
    $dbname = "revelLoginSystem";

    $mysqli = new mysqli("localhost", "root", "", "revelLoginSystem");
    $conn = mysqli_connect($dbServername, $dbuserNamename, $dbpassword, $dbname);

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordCon = mysqli_real_escape_string($conn, $_POST['passwordconfirm']);
    

    //error handlers
    if (empty($first) or empty($last) or empty($username) or empty($email) or empty($password)) {
        header("Location: ../signup.php");
        echo "Error: Field(s) left empty.";
    } 
    elseif (!ctype_alpha($first) or !ctype_alpha($last)) {
        header("Location: ../signup.php");
        echo "Error: Letters only for your name";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php");
        echo "Error: Not a real email";
    } 
    else{
        $sql = "SELECT * FROM users WHERE users_uName = '$username'";
        $result = mysqli_query($conn, $sql);
        $resultcheck = mysqli_num_rows($result);
        if($resultCheck > 0) {
            header("Location: ../signup.php");
        } 
        elseif ($password != $passwordCon) {
            header("Location: ../signup.php");
            echo "Error: Passwords dont match";
        }
        elseif(strlen(trim($password)) < 6){
            $password_err = "Password must have atleast 6 characters.";
        }
        else {
            if (mysqli_connect_errno()) {

                printf("Connect failed: %s\n", mysqli_connect_error());
            }
            $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
            $sqlInsert = "INSERT INTO `users`(`user_first`, `user_last`, `user_uName`, `user_email`, `user_pwd`) VALUES ('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[email]', '$hashedpwd');";
    
            mysqli_query($mysqli, $sqlInsert);
            header('Location: ../index.php');
        }
    }
} 
else {
    echo "Failure";
    exit();
}

?>