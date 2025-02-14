<?php
include('db_connect.php'); // Include your database connection file

// Check if the ID is passed
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare the DELETE query
    $sql = "DELETE FROM patients WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    // Execute the query
    if ($stmt->execute()) {
        echo "Patient deleted successfully.";
    } else {
        echo "Error deleting patient: " . $conn->error;
    }

    $stmt->close(); // Close the statement
    $conn->close(); // Close the connection
}
?>
