<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1); 
include('db_connect.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: Check if the data is received via POST
    echo "<pre>";
    print_r($_POST); // This will print the data coming from the form
    echo "</pre>";

    // Check if all required fields are present
    if (isset($_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['age'], $_POST['dob'], $_POST['gender'], $_POST['contact'], $_POST['address'], $_POST['bloodType'], $_POST['consultationDate'], $_POST['medicalHistory'], $_POST['chiefComplaint'], $_POST['emergencyContact'])) {
        // Get the form data
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $bloodType = $_POST['bloodType'];
        $consultationDate = $_POST['consultationDate'];
        $medicalHistory = $_POST['medicalHistory'];
        $chiefComplaint = $_POST['chiefComplaint'];
        $emergencyContact = $_POST['emergencyContact'];

        // Prepare an SQL statement to insert the data
        $sql = "INSERT INTO patients (first_name, middle_name, last_name, age, dob, gender, contact, address, blood_type, consultation_date, medical_history, chief_complaint, emergency_contact)
                VALUES ('$firstName', '$middleName', '$lastName', '$age', '$dob', '$gender', '$contact', '$address', '$bloodType', '$consultationDate', '$medicalHistory', '$chiefComplaint', '$emergencyContact')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New patient registered successfully!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Form data is missing or incomplete.'); window.location.href='index.php';</script>";
    }


    // Close the database connection
    $conn->close();
}
?>
