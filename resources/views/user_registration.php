<?php include 'connectdb.php';
$user_id = uniqid(prefix,more_entropy);
$username = $_POST['username'];
$password = $_POST['password'];

$query = "insert into user value('$user_id','$username','$password')";
    if ($conn->query($query) === TRUE) {
        echo "New User created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
?>