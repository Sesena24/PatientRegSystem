<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Registration System</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include('header.php'); ?>

<h2>Patient List</h2>
<input type="text" id="searchInput" placeholder="Search by name..." onkeyup="searchPatient()">

<table id="patientTable">
  <thead>
    <tr>
      <th>#</th> <!-- This is for the numbering -->
      <th>Full Name</th>
      <th>Age</th>
      <th>Date of Birth</th>
      <th>Gender</th>
      <th>Contact</th>
      <th>Address</th>
      <th>Blood Type</th>
      <th>Consultation Date</th>
      <th>Medical History</th>
      <th>Chief Complaint</th>
      <th>Emergency Contact</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>

   <?php
include('db_connect.php'); // Include your database connection file

// Pagination setup
$limit = 10;  // Number of patients per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;  // Calculate the offset based on the current page

// SQL query to fetch patients with pagination
$sql = "SELECT * FROM patients LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize the counter for the numbering
    $counter = $offset + 1;  // Start numbering from the correct number based on the page

    // Loop through the results and display them in the table
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $counter++ . "</td>"; // Display the patient number
        echo "<td>" . $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['dob'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['contact'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['blood_type'] . "</td>";
        echo "<td>" . $row['consultation_date'] . "</td>";
        echo "<td>" . $row['medical_history'] . "</td>";
        echo "<td>" . $row['chief_complaint'] . "</td>";
        echo "<td>" . $row['emergency_contact'] . "</td>";
        echo "<td>
                <button onclick=\"window.location.href='edit.php?id=" . $row['id'] . "'\">Edit</button>
                <button onclick='deletePatient(" . $row['id'] . ")'>Delete</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='12'>No patients found</td></tr>";
}

// Calculate the total number of pages
$total_result = $conn->query("SELECT COUNT(*) AS total FROM patients");
$row = $total_result->fetch_assoc();
$total_rows = $row['total'];
$total_pages = ceil($total_rows / $limit);

$conn->close(); // Close the database connection
?>
  </tbody>
</table>

<!-- Pagination Links -->
<div class="pagination">
  <?php if ($page > 1): ?>
    <a href="?page=<?php echo $page - 1; ?>">Previous</a>
  <?php endif; ?>

  <?php for ($i = 1; $i <= $total_pages; $i++): ?>
    <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
  <?php endfor; ?>

  <?php if ($page < $total_pages): ?>
    <a href="?page=<?php echo $page + 1; ?>">Next</a>
  <?php endif; ?>
</div>

<?php include('footer.php'); ?>

<script>
  // JavaScript for searching the patient list
  function searchPatient() {
    const filter = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.getElementById('patientTable').getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) {  // Starting from 1 to skip the header row
      const cells = rows[i].getElementsByTagName('td');
      const nameCell = cells[1].textContent.toLowerCase(); // Full Name column
      rows[i].style.display = nameCell.includes(filter) ? '' : 'none';
    }
  }


  // Function to delete patient
  function deletePatient(id) {
    // Confirm the action
    if (confirm('Are you sure you want to delete this patient?')) {
      // Send an AJAX request to delete the patient
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "delete_patient.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = function () {
        if (xhr.status === 200) {
          // If the deletion was successful, remove the row from the table
          alert("Patient deleted successfully.");
          location.reload();  // Reload the page to reflect the changes
        } else {
          alert("Error deleting patient.");
        }
      };
      xhr.send("id=" + id); // Send the patient ID to delete
    }
  }
</script>

</body>
</html>
