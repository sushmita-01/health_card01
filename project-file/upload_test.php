<?php
include 'db.php';

if (isset($_FILES['testFile'])) {
    $fileName = $_FILES['testFile']['name'];
    $tempName = $_FILES['testFile']['tmp_name'];
    $uploadDir = 'uploads/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $targetFile = $uploadDir . basename($fileName);

    if (move_uploaded_file($tempName, $targetFile)) {
        $sql = "INSERT INTO test_results (file_name) VALUES ('$fileName')";
        if ($conn->query($sql) === TRUE) {
            echo "Test result uploaded successfully";
        } else {
            echo "Error saving to DB";
        }
    } else {
        echo "Failed to upload file.";
    }
}
$conn->close();
?>
