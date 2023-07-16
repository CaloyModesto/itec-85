<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="backend.css">
</head>

<body>
    <div class="tbl">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Mobile</th>
                    <th>Action</th>
                    <th>
                        <a href='created.php'>Add</a>
                    </th>
                </tr>
            </thead>
    </div>
    <tbody>
        <?php
        include('backendconnection.php');
        $sql = "select * from records_tbl";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $userID = $row['userID'];
            $name = $row['name'];
            $address = $row['address'];
            $age = $row['age'];
            $contact = $row['contact'];


            echo "
                <tr>
                    <th>$userID</th>
                    <th>$name</th>
                    <th>$address</th>
                    <th>$age</th>
                    <th>$contact</th>
                    <th>
                        <a href='updater.php?userID=$userID'>Update</a>                    
                    </th>
                    <th>
                        <a href='deleter.php?userID=$userID'>Delete</a>                    
                    </th>

             
                </tr>
                ";
        }
        ?>
    </tbody>

    </table>
</body>

</html>