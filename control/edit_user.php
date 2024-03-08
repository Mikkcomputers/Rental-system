<?php
include "../saver/server.php";
    $update = false;
    $fullname = "";
    $username = "";
    $phone = "";
    $email = "";

if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];

    $sql = "SELECT * FROM register WHERE id = $id";
    $res = $conn->query($sql);
    $data = $res->fetch_assoc();

   if ($update == true) {
    $fullname = $data['fullname'];
    $username = $data['username'];
    $phone = $data['phone'];
    $email = $data['email'];
   }
}

if (isset($_POST['btn_update'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "UPDATE register SET fullname = '$fullname', username = '$username', phone = '$phone', email = '$email' WHERE id = $id ";
    $res = $conn->query($sql);
    if ($res) {
        header("location: user.php");
    }else{
        echo "
            <script>
                alert('Update have an Error');
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lineawesome/lineawesome/css/line-awesome.min.css">
    <script src="../sweetalert/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../style/index.css">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 offset-md-4 mt-5">
                <p class="text-success text-center">Update account</p>
                <form action="edit_user.php" method="post">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="hidden" name="id" class="form-control mb-2" value="<?=$data['id'];?>" required>
                        <input type="text" name="fullname" class="form-control mb-2" value="<?=$fullname?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Userame</label>
                        <input type="text" name="username" class="form-control mb-2" value="<?=$username?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="form-control mb-2"value="<?=$phone?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control mb-2"value="<?=$email?>" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control mb-2" required>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Comfirm Password</label>
                        <input type="password" name="cpassword" class="form-control mb-2" required>
                    </div> -->
                    <button name="btn_update" style="background-color:blue; color:white" class="btn form-control">Update</button>
                </form>
                <!-- <p class="text-success text-center mt-3">Have an account <a style="color:blue" href="login.html">Login</a></p> -->

            </div>
        </div>
    </div>
</body>
</html>