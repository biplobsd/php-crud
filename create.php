<?php
include "connect.php";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMsg = "";
$succMsg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMsg = "All field are required";
            break;
        }

        // Db add
        $query = "INSERT INTO clients(name, email, phone, address)
                    VALUES('$name', '$email', '$phone', '$address')";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            $errorMsg = "Error: " . $conn->error;
            break;
        }


        $name = "";
        $email = "";
        $phone = "";
        $address = "";

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
        Name:<br>
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