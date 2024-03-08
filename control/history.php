<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lineawesome/lineawesome/css/line-awesome.min.css">
</head>
<body>
    <div class="container">
        <table class="table table-responsive table-striped table-hover">
            <p><a href="dashboard.html">Goto dashboard</a></p>
            <tr>
                <th colspan="12">All Users</th>
            </tr>
            <tr>
                <th>S/N</th>
                <th>Full Name</th>
                <th>Phone 1</th>
                <th>Phone 2</th>
                <th>Garantor</th>
                <th>Type Rent</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Rent From</th>
                <th>Rent To</th>
                <th colspan="2">Action</th>
            
            </tr>
            <?php 
            include "../saver/server.php";
            $sn=1;
            $sql = "SELECT * FROM rental";
            $res = $conn->query($sql);
            while($data = $res->fetch_assoc()):

            ?>
            <tr>
                <td><?=$sn++?></td>
                <td><?=$data['fullname'];?></td>
                <td><?=$data['phone1'];?></td>
                <td><?=$data['phone2'];?></td>
                <td><?=$data['garantor'];?></td>
                <td><?=$data['type_rent'];?></td>
                <td><?=$data['quantity'];?></td>
                <td><?=$data['price'];?></td>
                <td><?=$data['rent_from'];?></td>
                <td><?=$data['rent_to'];?></td>
                <td><a href="delete.php?delete=<?=$data['id'];?>"><i class="la la-trash"></i>Delete</a></td>
                <td><a href="delete.php?delete=<?=$data['id'];?>"><i class="la la-edit"></i>Edit</a></td>
               
            </tr>
            <?php endwhile ?>
        </table>
    </div>
</body>
</html>