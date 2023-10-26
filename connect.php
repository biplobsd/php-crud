<?php
$conn = mysqli_connect("localhost", "root", "", "newshop");

if (!$conn) {
    echo "Error";
} else {
    echo "Success";
}

?>