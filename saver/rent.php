<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <!-- <link rel="stylesheet" href=""> -->
    <script src="../sweetalert/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
</body>
</html>
<?php
include "server.php";
if (isset($_POST['btn_rent'])) {
    $fullname = $_POST['fullname'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $garantor = $_POST['garantor'];
    $typerent = $_POST['type'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $rentfrom = $_POST['from'];
    $to = $_POST['to'];


    $sql = "INSERT INTO `rental`( `fullname`, `phone1`, `phone2`, `garantor`, `type_rent`, `quantity`, `price`, `rent_from`, `rent_to`)VALUES('$fullname','$phone1','$phone2','$garantor','$typerent',$quantity,$price, '$rentfrom', '$to')";
    $result = $conn->query($sql);
    if ($result) {
        echo "
        
            <script>
                swal('Done','Thanks {$fullname}','success')
                .then(
                    function(res){
                        if(true){
                            window.location='../control/renting.html';
                        }
                    }
                )
            </script>";
        
    }else{
        echo "
            <script>
                swal('Error','Adding Have an Error','error');
            </script>
        ";
    }
}

?>