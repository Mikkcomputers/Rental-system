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
.cards{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
    align-items:center;
    justify-content:center;
    gap:20px;
    margin-top:20px;
}
.card{
    box-shadow: 3px 3px 3px 3px darkblue;
    padding: 50px 60px 50px 60px;
    color:blue;
    border-radius:20px

}
.card:hover{
    box-shadow: 3px 3px 3px 3px darkblue;
    padding: 52px 62px 52px 62px;
    color:blue;
    border-radius:20px

}
td,th{
    font-size:13px;
}


</style>
</head>
<body>
    
    <div class="cont">
        <nav>
            <ul style="background: white; margin-bottom: 50px;">
                <li style="background: white; color: blue;">Dashboard</li>
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
            <div class="cards">
            <?php 
            include "../saver/server.php";
            
            $sql = "SELECT * FROM rental";
            $res = $conn->query($sql);
            $tada = $res->fetch_assoc();
                
                $total = $tada['price']*$tada['quantity'];
                

            ?>
                <div class="card text-center">All Total Amount <span style="color:red;"><?= $total; ?></span></div>
                <?php
                 $sql = "SELECT COUNT(username) as user1 FROM register";
                 $res = $conn->query($sql);
                
                ?>
                <div class="card text-center" >All Users <span style="color:red"><?= $data = $res->fetch_assoc()['user1'];?></span></div>
                <?php
                 $sql = "SELECT COUNT(id) as user1 FROM rental";
                 $res = $conn->query($sql);
                
                ?>
                <div class="card text-center" >Total Record <span style="color:red"><?= $data = $res->fetch_assoc()['user1'];?></span></div>
            
            </div>
            <div class="container">
        <table style="color:blue; " class="table table-responsive table-striped text-center table-hover">
            <!-- <p><a href="dashboard.html">Goto dashboard</a></p> -->
            <tr>
                <th colspan="12">Rental History</th>
            </tr>
            <tr>
                <th>S/N</th>
                <th>Full Name</th>
                <th>Phone Number 1</th>
                <th>Phone Number 2</th>
                <th>Garantor</th>
                <th>Type Rent</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Rent From</th>
                <th>Rent To</th>
                <th colspan="2">Action</th>
            
            </tr>
           <?php
           $sn = 1;
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
                <td><a style="color:red" title="Delete" href="delete_rental.php?delete=<?=$data['id'];?>"><i class="la la-trash"></i></a></td>
                <td><a style="color:blue" title="Edit" href="edit.php?edit=<?=$data['id'];?>"><i class="la la-edit"></i></a></td>
               
            </tr>
            <?php endwhile ?>
        </table>
    </div>
        </article>

    </div>
</body>
</html>