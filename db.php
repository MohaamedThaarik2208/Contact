<?php

$conn = mysqli_connect("localhost", "root", "", "contact2_db");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>