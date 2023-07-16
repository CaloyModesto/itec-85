<?php
if (isset($_GET['userID'])) {
    $userID = $_GET['userID'];
    include("backendconnection.php");

    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM records_tbl WHERE userID = $userID";
    mysqli_query($con, $sql);

    header('location: reader.php');
    exit;
}