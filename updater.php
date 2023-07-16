<?php
session_start();
include("backendconnection.php");

if (!isset($_GET["userID"])) {
    header('location: reader.php');
    exit;
}

$userID = $_GET['userID'];
$sql = "SELECT * FROM records_tbl WHERE userID = $userID";
$result = mysqli_query($con, $sql);
$row = $result->fetch_assoc();

if (!$row) {
    header('location: read.php');
    exit;
}

$name = $row['name'];
$address = $row['address'];
$age = $row['age'];
$contact = $row['contact'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];

    if (count($_POST) > 0) {
        $sql = "UPDATE records_tbl
        set name = '$name', address = '$address', age = '$age', contact = '$contact'
        where userID = '$userID'
        ";
        mysqli_query($con, $sql);
    }

    $selectsql = "select * from records_tbl where userID = '$userID'";
    $result = mysqli_query($con, $selectsql);
    $row = mysqli_fetch_array($result);
    header("location: reader.php");
    $con->close();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="backend.css">
</head>

<body>
    <form class="tbl" action="" method="post">
        <label for="">Name</label>
        <input type="text" name='name' value="<?php echo $row['name'] ?>"></input>
        <label for="">Address</label>
        <input type="text" name="address" value="<?php echo $row['address'] ?>"></input>
        <label for="">Age</label>
        <input type="text" type='email' name='age' value="<?php echo $row['age'] ?>"></input>
        <label for="">Contact</label>
        <input type="text" name='contact' value="<?php echo $row['contact'] ?>"></input>
        <input type="submit" value="update">
        <a href="reader.php" role="button">Cancel</a>
    </form>
</body>

</html>