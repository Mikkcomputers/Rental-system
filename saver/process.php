<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="">
    <script src="../sweetalert/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
</body>
</html>
<?php
include "server.php";
if (isset($_POST['btn_reg'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password != $cpassword) {
        echo "
        <script>
            swal('Error','The two password mix match','error');
        </script>
    ";
        
    }

    $sql = "INSERT INTO `register`( `fullname`, `username`, `phone`, `email`, `password`)VALUES('$fullname','$username','$phone','$email','$password')";
    $result = $conn->query($sql);
    if ($result) {
        echo 
        header("location: ../control/login.html");
            // <script>
            //     swal('Done','Register Successfully','success').then(function(res)if(res){window.location='../control/login.php'});
            // </script>";
        
    }else{
        echo "
            <script>
                swal('Error','Register Have an Error','error');
            </script>
        ";
    }
}

?>