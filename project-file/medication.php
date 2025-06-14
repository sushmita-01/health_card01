<?php
include 'db.php';

$name = $_POST['medicationName'];
$dosage = $_POST['medicationDosage'];
$date = $_POST['medicationDate'];

$sql = "INSERT INTO medications (medication_name, dosage, medication_date)
        VALUES ('$name', '$dosage', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "Medication added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
