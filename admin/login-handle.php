<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: login.php');
    exit();
}

$email = $_POST['email'];
$password = $_POST['password'];

include 'db-con.php';

$query= "SELECT * FROM `user` WHERE email=? AND password=?;";
$mysql_stmt=mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($mysql_stmt, 'ss',$email, $password);
mysqli_stmt_execute($mysql_stmt);
$mysql_result= mysqli_stmt_get_result($mysql_stmt);
$data= mysqli_fetch_assoc($mysql_result);

if($data){
    session_start();
    $_SESSION['is_loggedin'] = true;
    header("Location: dashboard.php");
}else{
    header("Location: login.php?error=email or password incorrect");
}
?>