<?php

include "db.php";

$id = $_GET["id"];

$result = mysqli_query(
    $conn,
    "SELECT * FROM contacts WHERE id=$id"
);

$row = mysqli_fetch_assoc($result);

if (isset($_POST["update"])) {

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $sql = "UPDATE contacts
            SET name='$name',
                phone='$phone',
                email='$email'
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {

        header("Location: index.php?message=Contact Updated Successfully");

        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Contact</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-container">

    <h1>Edit Contact</h1>

    <form method="POST" onsubmit="return validateForm()">

        <label>Name</label>

        <input type="text"
               id="name"
               name="name"
               value="<?php echo htmlspecialchars($row['name']); ?>"
               required>

        <label>Phone</label>

        <input type="text"
               id="phone"
               name="phone"
               value="<?php echo htmlspecialchars($row['phone']); ?>"
               required>

        <label>Email</label>

        <input type="email"
               id="email"
               name="email"
               value="<?php echo htmlspecialchars($row['email']); ?>"
               required>

        <button type="submit" name="update">
            Update Contact
        </button>

    </form>

    <a href="index.php">Back to Contacts</a>

</div>

<script src="script.js"></script>

</body>

</html>