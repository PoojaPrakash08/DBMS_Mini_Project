<?php
$username = $_POSt['username'];
$password = $_POST['password'];

$con = new mysqli("localhost", "root", "test");
if ($con->connect_error) {
    die("Failed to connect : " . $con->connect_error);
}else 
    $stmt = $con->prepare("select * from login where username = ? ");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password) {
            echo "<h2> Login Succesfully</h2>";
        }else {
            echo"<h2>Invalid Username or Password</h2>";
        }

    }else{
        echo "<h2>Invalid username or password</h2>";
    }
?>