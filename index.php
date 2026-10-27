<?php
include "db.php";

$result = mysqli_query($conn, "SELECT * FROM contacts");
?>

<!DOCTYPE html>
<html>
<head>

    <title>Contact Management System</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="page">

    <!-- Header -->
    <header>

        <div class="logo">
             Contact Manager
        </div>

        <nav>
            <a href="index.php">Home</a>
            <a href="add.php">Add Contact</a>
        </nav>

    </header>


    <!-- Main Section -->
    <main>

        <section class="hero">

            <div>
                <h1>Contact Management System</h1>

                <p>
                    Easily add, edit, search and manage your contacts.
                </p>
            </div>

            <a href="add.php" class="add-button">
                + Add Contact
            </a>

        </section>


        <!-- Search -->
        <section class="search-box">

            <input
                type="text"
                id="search"
                placeholder="🔍 Search by name, phone or email..."
                onkeyup="searchContacts()"
            >

        </section>


        <!-- Contact Table -->
        <section class="table-card">

            <div class="table-header">

                <h2>📋 Contact List</h2>

                <span>
                    <?php echo mysqli_num_rows($result); ?> Contacts
                </span>

            </div>


            <div class="table-container">

                <table id="contactTable">

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>

                            <td>
                                <span class="id">
                                    <?php echo $row["id"]; ?>
                                </span>
                            </td>

                            <td>
                                <strong>
                                    <?php echo htmlspecialchars($row["name"]); ?>
                                </strong>
                            </td>

                            <td>
                                📞 <?php echo htmlspecialchars($row["phone"]); ?>
                            </td>

                            <td>
                                ✉️ <?php echo htmlspecialchars($row["email"]); ?>
                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="edit.php?id=<?php echo $row['id']; ?>"
                                        class="edit-button"
                                    >
                                        ✏️ Edit
                                    </a>

                                    <a
                                        href="delete.php?id=<?php echo $row['id']; ?>"
                                        class="delete-button"
                                        onclick="return confirm('Are you sure you want to delete this contact?');"
                                    >
                                        🗑️ Delete
                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </section>

    </main>


    <!-- Footer -->
    <footer>

        <p>
            © 2026 Contact Management System
        </p>

    </footer>

</div>


<script>

function searchContacts() {

    let input =
        document.getElementById("search").value.toLowerCase();

    let rows =
        document.querySelectorAll("#contactTable tbody tr");

    rows.forEach(function(row) {

        let text = row.innerText.toLowerCase();

        if (text.includes(input)) {

            row.style.display = "";

        } else {

            row.style.display = "none";

        }

    });

}

</script>

</body>
</html>