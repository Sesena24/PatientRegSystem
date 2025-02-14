<?php
include('db_connect.php');

// Get the patient ID from the URL
$patient_id = $_GET['id'];

// Fetch the patient's current data
$sql = "SELECT * FROM patients WHERE id = $patient_id";
$result = $conn->query($sql);
$patient = $result->fetch_assoc();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $blood_type = $_POST['blood_type'];
    $consultation_date = $_POST['consultation_date'];
    $medical_history = $_POST['medical_history'];
    $chief_complaint = $_POST['chief_complaint'];
    $emergency_contact = $_POST['emergency_contact'];

    // Update the patient in the database
    $update_sql = "UPDATE patients SET 
        first_name = '$first_name', 
        middle_name = '$middle_name', 
        last_name = '$last_name', 
        age = '$age', 
        dob = '$dob', 
        gender = '$gender', 
        contact = '$contact', 
        address = '$address', 
        blood_type = '$blood_type', 
        consultation_date = '$consultation_date', 
        medical_history = '$medical_history', 
        chief_complaint = '$chief_complaint', 
        emergency_contact = '$emergency_contact' 
        WHERE id = $patient_id";

    if ($conn->query($update_sql) === TRUE) {
         echo "<script>alert('Record updated successfully!'); window.location.href='patient_list.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

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


<div class="form-container">

<form method="POST">

<h4>Update Patient Information </h4>
    
    <div class="form-field">
      <label for="firstName">First Name:</label>
      <input type="text" name="first_name" value="<?php echo $patient['first_name']; ?>" required>
    </div>

    <div class="form-field">
      <label for="middleName">Middle Name:</label>
      <input type="text" name="middle_name" value="<?php echo $patient['middle_name']; ?>" required>
    </div>

    <div class="form-field">
      <label for="lastName">Last Name:</label>
      <input type="text" name="last_name" value="<?php echo $patient['last_name']; ?>" required>
    </div>

    <div class="form-field">
      <label for="age">Age:</label>
      <input type="number" name="age" value="<?php echo $patient['age']; ?>" required>
    </div>

    <div class="form-field">
      <label for="dob">Date of Birth:</label>
      <input type="date" name="dob" value="<?php echo $patient['dob']; ?>" required>
    </div>

  <!--need check again the code.-->
   <div class="form-field">
    <label for="gender">Gender:</label>
    <select name="gender" required>
        <option value="" disabled <?php echo ($patient['gender'] == '') ? 'selected' : ''; ?>>Select Gender</option>
        <option value="Male" <?php echo (isset($patient['gender']) && $patient['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
        <option value="Female" <?php echo (isset($patient['gender']) && $patient['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
    </select>
    </div>


    <div class="form-field">
      <label for="contact">Contact Number:</label>
      <input type="text" name="contact" value="<?php echo $patient['contact']; ?>" required>
    </div>

    <div class="form-field">
      <label for="address"> Address:</label>
      <input type="address" name="address" value="<?php echo $patient['address']; ?>" required>
    </div>

<div class="form-field">
    <label for="bloodType">Blood Type:</label>
    <select id="bloodType" name="blood_type" required>
        <option value="" disabled <?php echo ($patient['blood_type'] == '') ? 'selected' : ''; ?>>Select Blood Type</option>
        <option value="A+" <?php echo (isset($patient['blood_type']) && $patient['blood_type'] == 'A+') ? 'selected' : ''; ?>>A+</option>
        <option value="B+" <?php echo (isset($patient['blood_type']) && $patient['blood_type'] == 'B+') ? 'selected' : ''; ?>>B+</option>
        <option value="AB+" <?php echo (isset($patient['blood_type']) && $patient['blood_type'] == 'AB+') ? 'selected' : ''; ?>>AB+</option>
        <option value="A-" <?php echo (isset($patient['blood_type']) && $patient['blood_type'] == 'A-') ? 'selected' : ''; ?>>A-</option>
        <option value="B-" <?php echo (isset($patient['blood_type']) && $patient['blood_type'] == 'B-') ? 'selected' : ''; ?>>B-</option>
        <option value="AB-" <?php echo (isset($patient['blood_type']) && $patient['blood_type'] == 'AB-') ? 'selected' : ''; ?>>AB-</option>
        <option value="O+" <?php echo (isset($patient['blood_type']) && $patient['blood_type'] == 'O+') ? 'selected' : ''; ?>>O+</option>
        <option value="O-" <?php echo (isset($patient['blood_type']) && $patient['blood_type'] == 'O-') ? 'selected' : ''; ?>>O-</option>
    </select>
</div>

  <h4>Update Medical Concerns</h4>

    <div class="form-field">
      <label for="consultationDate">Consultation Date:</label>
      <input type="date" name="consultation_date" value="<?php echo $patient['consultation_date']; ?>" required>
    </div>

  
<div class="form-field">
    <label for="medicalHistory">Medical History:</label>
    <textarea name="medical_history" required><?php echo htmlspecialchars($patient['medical_history']); ?></textarea>
</div>

<div class="form-field">
    <label for="chiefComplaint">Chief Complaint:</label>
    <textarea name="chief_complaint" required><?php echo htmlspecialchars($patient['chief_complaint']); ?></textarea>
</div>

    <div class="form-field">
      <label for="emergencyContact">Emergency Contact Number:</label>
      <input type="text" name="emergency_contact" value="<?php echo $patient['emergency_contact']; ?>" required>
    </div>


    <button type="submit">Update</button>

</form>
</div>


<?php include('footer.php'); ?>


</body>
</html>




  
