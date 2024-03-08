<?php
include "../saver/server.php";

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM rental WHERE id = $id";
    $res = $conn->query($sql);
    if ($res) {
        header("Location: dashboard.php");
    }
}
?>