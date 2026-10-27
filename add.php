<?php

include "db.php";

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $sql = "INSERT INTO contacts (name, phone, email)
            VALUES ('$name', '$phone', '$email')";

    if (mysqli_query($conn, $sql)) {

        header("Location: index.php?message=Contact Added Successfully");

        exit();

    } else {

        echo "Error: " . mysqli_error($conn);

    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Contact</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="form-container">

    <h1>Add Contact</h1>

    <form method="POST" onsubmit="return validateForm()">

        <label>Name</label>

        <input type="text"
               id="name"
               name="name"
               placeholder="Enter name"
               required>

        <label>Phone</label>

        <input type="text"
               id="phone"
               name="phone"
               placeholder="Enter phone number"
               required>

        <label>Email</label>

        <input type="email"
               id="email"
               name="email"
               placeholder="Enter email"
               required>

        <button type="submit" name="submit">
            Add Contact
        </button>

        <button type="button"
                class="clear-btn"
                onclick="clearForm()">
            Clear
        </button>

    </form>

    <a href="index.php">Back to Contacts</a>

</div>

<script src="script.js"></script>

</body>

</html>