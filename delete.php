<?php

include "db.php";

$id = $_GET["id"];

$sql = "DELETE FROM contacts WHERE id=$id";

if (mysqli_query($conn, $sql)) {

    header("Location: index.php?message=Contact Deleted Successfully");

    exit();

} else {

    echo "Error: " . mysqli_error($conn);

}

?>
?>