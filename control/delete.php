<?php
include "../saver/server.php";

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM register WHERE id = $id";
    $res = $conn->query($sql);
    if ($res) {
        header("Location: user.php");
    }
}
?>