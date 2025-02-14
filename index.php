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
  <h3>Register New Patient</h3>
  <form id="patientForm" method="POST" action="register_patient.php">

    <h4>Patient Information</h4>
    
    <div class="form-field">
      <label for="firstName">First Name:</label>
      <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
    </div>

    <div class="form-field">
      <label for="middleName">Middle Name:</label>
      <input type="text" id="middleName" name="middleName" placeholder="Middle Name" required>
    </div>

    <div class="form-field">
      <label for="lastName">Last Name:</label>
      <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
    </div>

    <div class="form-field">
      <label for="age">Age:</label>
      <input type="number" id="age" name="age" placeholder="Age" required>
    </div>

    <div class="form-field">
      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" name="dob" placeholder="Date of Birth" required>
    </div>

    <div class="form-field">
      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
          <option value="" disabled selected>Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
      </select>
    </div>

    <div class="form-field">
      <label for="contact">Contact Number:</label>
      <input type="text" id="contact" name="contact" placeholder="Contact Number" required>
    </div>

    <div class="form-field">
      <label for="address"> Address:</label>
      <input type="address" id="address" name="address" placeholder="Address" required>
    </div>

    <div class="form-field">
      <label for="bloodType">Blood Type:</label>
       <select id="bloodType" name="bloodType" required>
          <option value="" disabled selected>Select Blood Type</option>
          <option value="A+">A+</option>
          <option value="B+">B+</option>
          <option value="AB+">AB+</option>
          <option value="A-">A-</option>
          <option value="B-">B-</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
      </select>
    </div>
    
    <h4>Medical Concerns</h4>

    <div class="form-field">
      <label for="consultationDate">Consultation Date:</label>
      <input type="date" id="consultationDate" name="consultationDate" placeholder="Consultation Date" required>
    </div>

    <div class="form-field">
      <label for="medicalHistory">Medical History:</label>
      <textarea id="medicalHistory" name="medicalHistory" placeholder="Medical History" required></textarea>
    </div>

    <div class="form-field">
      <label for="chiefComplaint">Chief Complaint:</label>
      <textarea id="chiefComplaint" name="chiefComplaint" placeholder="Chief Complaint" required></textarea>
    </div>

    <div class="form-field">
      <label for="emergencyContact">Emergency Contact Number:</label>
      <input type="text" id="emergencyContact" name="emergencyContact" placeholder="Emergency Contact Number" required>
    </div>

    <button type="submit">Register Patient</button>
  </form>
</div>

<?php include('footer.php'); ?>


</body>
</html>
