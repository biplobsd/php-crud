<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Shop</title>
</head>

<body>

    <h2>List of Clients</h2>
    <a href="/newshop/create.php">New Client</a>

    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Created At</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
            include "connect.php";

            $query = "SELECT * FROM clients";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Error");
            }

            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[address]</td>
                <td>$row[created_at]</td>
                <td>
                    <a href='/newshop/edit.php?id=$row[id]'>Edit</a>
                    <a href='/newshop/delete.php?id=$row[id]'>Delete</a>
                </td>
            </tr>
            ";

            }
            ?>
        </tbody>
    </table>


</body>

</html>