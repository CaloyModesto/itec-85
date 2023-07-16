<?php
include("backendconnection.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];

    if (!empty($name) && !empty($address) && !empty($age) && !empty($contact)) {
        $query = "INSERT INTO records_tbl (userID, username, password, name, address, age, contact) values ('', '$username','$password','$name', '$address', '$age', '$contact')";
        $result = mysqli_query($con, $query);

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="backend.css">
</head>

<body>
    <form action="" method="post">
        <h1>Register</h1>
        <label for="">Username</label>
        <input id="add" type="text" name="username"></input>
        <label for="">Password</label>
        <input id="add" type="password" name="password" required minlength="8"></input>
        <label for="">Name</label>
        <input id="add" type="text" name="name"></input>
        <label for="">Address</label>
        <input id="add" type="text" name="address"></input>
        <label for="">Age</label>
        <input id="add" type="text" name="age"></input>
        <label for="">Contact</label>
        <input id="add" type="text" name="contact"></input>
        <input id="btn" type="submit" value="submit">
        <a href="reader.php">See Records</a>
    </form>
</body>

</html>