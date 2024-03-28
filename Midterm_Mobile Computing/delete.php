<?php
// Including the database connection file
include("config.php");

if (isset($_GET['id'])) {
    // Getting id of the data from URL
    $id = $_GET['id'];

    // Check if the user confirmed the deletion
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        // Deleting the row from the table
        $result = mysqli_query($conn, "DELETE FROM contact_message WHERE id=$id");
        if ($result) {
            // Redirect to the display page (index.php in our case)
            header("Location: table.php");
        } else {
            // Handle any errors here
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Prompt the user for confirmation using JavaScript
        echo '<script>
            var confirmDelete = confirm("Are you sure you want to permanently delete this record?");
            if (confirmDelete) {
                window.location.href = "delete.php?id=' . $id . '&confirm=yes";
            } else {
                window.location.href = "table.php"; // Redirect back to the records page
            }
        </script>';
    }
}
?>