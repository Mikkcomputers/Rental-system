<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="">
    <script src="../sweetalert/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
</body>
</html>

<?php
include "../saver/server.php";
if (isset($_POST['btn_log'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

$sql = "SELECT * FROM register WHERE username = '$username' AND `password` = '$password' LIMIT 1";
$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res)==1) {
    session_start();
    $_SESSION['logged'] = $username;
    echo 
        header("location: ../control/dashboard.php");
            // <script>
            //     swal('Done','Thanks {$username} for Logi','success').then((()){window.location='../control/login.php'});
            // </script>";
        
    }else{
        header("locaction:login.html");
        echo "
            <script>
                swal('Error','Invalid username/password','error')
                .then(
                    function(res){
                        if(true){
                            window.location='login.html';
                        }
                    }
                )
            </script>
        ";
    }
}
?>