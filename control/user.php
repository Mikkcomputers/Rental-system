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
td,th{
    font-size:13px;
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
            <div class="container mt-5 p-5">
            <table style="color:blue" class="table table-responsive text-center  table-strick table-hover">
                <!-- <p><a href="dashboard.html">Goto dashboard</a></p> -->
                <tr>
                    <th colspan="8">All Users</th>
                </tr>
                <tr>
                    <th>S/N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th colspan="2">Action</th>
                
                </tr>
                <?php 
                include "../saver/server.php";
                $sn=1;
                $sql = "SELECT * FROM register";
                $res = $conn->query($sql);
                while($data = $res->fetch_assoc()):
    
                ?>
                <tr>
                    <td><?=$sn++?></td>
                    <td><?=$data['fullname'];?></td>
                    <td><?=$data['username'];?></td>
                    <td><?=$data['phone'];?></td>
                    <td><?=$data['email'];?></td>
                    <td><?=$data['date'];?></td>
                    <td><a style="color:blue" href="delete.php?delete=<?=$data['id'];?>" title="Delete"><i style="color:red" class="la la-trash"></i></a></td>
                    <td><a style="color:blue" href="edit_user.php?edit=<?=$data['id'];?>" title="Edit"><i class="la la-edit"></i></a></td>
                   
                </tr>
                <?php endwhile ?>
            </table>
            </div>
        </article>

    </div>
</body>
</html>