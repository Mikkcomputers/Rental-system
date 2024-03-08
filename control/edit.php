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
include "../saver/server.php";

$update = false;
$fullname ="";
$phone1 = "";
$phone2 = "";
$garantor = "";
$typerent = "";
$quanlity =  "";
$price = "";
$to = "";
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $sql = "SELECT * FROM rental WHERE id = $id";
    $res = $conn->query($sql);
    $data = $res->fetch_assoc();

    if ($update == true) {
        $fullname = $data['fullname'];
        $phone1 = $data['phone1'];
        $phone2 = $data['phone2'];
        $garantor = $data['garantor'];
        $typerent = $data['type_rent'];
        $quantity = $data['quantity'];
        $price = $data['price'];
        $from = $data['rent_from'];
        $to = $data['rent_to'];
    }
}

if (isset($_POST['btn_update'])) {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $garantor = $_POST['garantor'];
    $typerent = $_POST['type'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $rentfrom = $_POST['from'];
    $to = $_POST['to'];


    $sql = "UPDATE  rental SET fullname ='$fullname', phone1 ='$phone1', phone2 ='$phone2',    garantor ='$garantor', type_rent ='$typerent', quantity = $quantity, price = $price, rent_from ='$rentfrom', rent_to ='$to' WHERE id = $id";
    $result = $conn->query($sql);
    if ($result) {
        echo "
        
            <script>
                swal('Done','Updating {$fullname}','success')
                .then(
                    function(res){
                        if(true){
                            window.location='../control/dashboard.php';
                        }
                    }
                )
            </script>";
        
    }else{
        echo "
            <script>
                swal('Error','Updating Have an Error','error');
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
    <title>Rental system</title>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lineawesome/lineawesome/css/line-awesome.min.css">
<link rel="stylesheet" href="../style/index.css">
<style>
        form{
            display: flex;
            flex-direction: row;
            /* margin-right: 5px; */
        }
        .col-md-5{
            margin:5px;
            margin-right: 7px;
        }
    </style>
</head>
<body>
    
    <div class="cont">
        <nav>
            <ul style="background: white; margin-bottom: 50px;">
                <li style="background: white; color: blue;"><a style="color: blue;" href="dashboard.php">Dashboard</a></li>
            </ul>
            <ul class="nab1">
                <li>
                    <a href="renting.html">Rent</a>
                </li>
                <li>
                    <a href="user.php">User</a>
                </li>
                <li>
                    <a href="About.html">About</a>
                </li>
                <li style="margin-top: 4rem;">
                    <a href="login.html" >Logout</a>
                </li>
                
            </ul>
        </nav>
        <article>
            <header>
                <ul>
                    
                    <li>
                        <a href="renting.html">Rent</a>
                    </li>
                    <li>
                        <a href="user.php">User</a>
                    </li>
                    <li>
                        <a href="About.html">About</a>
                    </li>
                    <li>
                        <a href="login.html">Logout</a>
                    </li>
                    
                </ul>
            </header>
            
            <h4 class="text-center text-maroon">Update Renting</h4>
            <form action="edit.php" method="post">
            
            <div class="col-md-5">
                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="hidden" name="id" class="form-control mb-2" value="<?php echo $data['id']; ?>" id=""  placeholder="Enter Your fullname">
                    <input type="text" name="fullname" class="form-control mb-2" value="<?php echo $fullname ?>" id=""  >
                </div>
                <div class="form-group">
                    <label for="Phone Number">Phone Number</label>
                <input type="text" name="phone1" id="" class="form-control mb-2" value="<?php echo $phone1 ?>" >
                <input type="text" name="phone2" id="" class="form-control mb-2" value="<?php echo $phone2 ?>" placeholder="Phone number 2">
                </div>
                <div class="form-group">
                    <label for="sponsor">Garantor</label>
                <input type="text" name="garantor" id="" value="<?php echo $garantor ?>" class="form-control mb-2" placeholder="Garantor">
                </div>
                <div class="form-group">
                    <label for="sponsor">Type Rent Material</label>
                    <select name="type" value="<?php echo $typerent ?>" id="" class="form-select mb-2">
                        <option value="Canopies">Canopies</option>
                        <option value="Chairs">Chairs</option>
                        <option value="Conopies/Chairs">Conopies/Chairs</option>
                    </select>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="number"  value="<?php echo $quantity ?>" name="quantity" class="form-control mb-2" placeholder="Quantity" id="">
                </div>
                <div class="form-group">
                    <label for="qty">Price</label>
                    <input type="number"  value="<?php echo $price ?>" name="price" class="form-control mb-2" placeholder="Price" id="">
                </div>
                <div class="form-group">
                    <label for="from">Rent From</label>
                    <input type="date" name="from" value="<?php echo $rentfrom ?>" class="form-control mb-2" id="">
                    <label for="to">To</label>
                    <input type="date" name="to" value="<?php echo $to ?>" class="form-control mb-2" id="">
                </div>
            <button name="btn_update" class="btn btn-primary form-control">Update</button>
    
               
            </div>
            </form>
        </article>

    </div>
</body>
</html>