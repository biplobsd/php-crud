<?php
include "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM clients WHERE id=$id";
    $result = mysqli_query($conn, $query);
}

header("location: /newshop/index.php");
exit;
?>