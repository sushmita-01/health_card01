<?php
include 'db.php';

$doctorName = $_POST['doctorName'];
$visitDate = $_POST['visitDate'];
$visitNotes = $_POST['visitNotes'];

$sql = "INSERT INTO doctor_visits (doctor_name, visit_date, visit_notes)
        VALUES ('$doctorName', '$visitDate', '$visitNotes')";

if ($conn->query($sql) === TRUE) {
    echo "Doctor visit added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
