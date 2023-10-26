<?php
include "connect.php";
$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMsg = "";
$succMsg = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header('location: /newshop/index.php');
        exit;
    }

    $id = $_GET['id'];

    $query = "SELECT * FROM clients WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];


} else {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    do {
        if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMsg = "All field are required";
            break;
        }

        // Db Update
        $query = "UPDATE clients " .
            "SET name='$name', email='$email', phone='$phone', address='$address' " .
            "WHERE id=$id";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            $errorMsg = "Error: " . $conn->error;
            break;
        }

        $succMsg = "Client added";

        header("location: /newshop/index.php");
        exit;
    } while (false);


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>
    <h2>New Client</h2>

    <?php
    if (!empty($errorMsg)) {
        echo $errorMsg;
    }
    ?>

    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Name:<br>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <br>
        Email:<br>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <br>
        Phone:<br>
        <input type="text" name="phone" value="<?php echo $phone; ?>">
        <br>
        Address:<br>
        <input type="text" name="address" value="<?php echo $address; ?>">
        <br>

        <?php
        if (!empty($succMsg)) {
            echo $succMsg;
        }
        ?>

        <br>
        <button>Submit</button>
    </form>

</body>

</html>