<?php
include 'connect.php';
$fullname = $_POST['name'];
$email = $_POST['email'];
$state = $_POST['state'];
$complaint_against=$_POST['cmpagn'];
$complaint = $_POST['complaint'];
$userCheckQuery = "SELECT * FROM users WHERE email = '$email'";
$userResult = $conn->query($userCheckQuery);

if ($userResult->num_rows > 0) {
    $complaintCheckQuery = "SELECT * FROM complaints WHERE email = '$email'";
    $complaintResult = $conn->query($complaintCheckQuery);

    if ($complaintResult->num_rows === 0) {
        $insertQuery = "INSERT INTO complaints (fullname, email, state, complaint_against, complaint) VALUES ('$fullname', '$email', '$state', '$complaint_against','$complaint')";
        $insert = "INSERT INTO track (fullname, email, state, complaint_against, complaint) VALUES ('$fullname', '$email', '$state', '$complaint_against','$complaint')";


        if ($conn->query($insertQuery) === TRUE && $conn->query($insert) === TRUE) {
            echo "<script>alert('Complaint submitted successfully!');
            window.location.href = 'complaint.html';</script>";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert('You have already submitted a complaint.!');
        window.location.href = 'complaint.html';</script>";
    }
} else {
    echo "<script>alert('User with email $email does not exist.!');
    window.location.href = 'cform.html';</script>";
}

// Close the database connection
$conn->close();
?>
