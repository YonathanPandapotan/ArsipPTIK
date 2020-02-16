<?php
session_start();
include 'connectdb.php';

//validate
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "select * from users where username='$username' and password='$password' limit 1";

    $result = mysqli_query($conn,$query);
    $rowcount = mysqli_num_rows($result);
    echo $rowcount;
    $row = mysqli_fetch_assoc($result);
    if($rowcount == 1){
        $_SESSION['id'] = $row['id'];
        header("location: /home.php");
        echo "you've login";
    }
    else{
        echo "try checking your input";
    }
}


// Store Session Data
$status = "";
$_SESSION['login_user']= $status;  // Initializing Session with value of PHP Variable
?>