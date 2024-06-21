<?php
include 'connect.php';
$email = $_POST['email'];
$password = $_POST['password'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       echo"<script>
       alert('Welcome');
       window.location.href = 'complaint.html';
     </script>";
    } else {
        // Check in the staff table
        $sql_staff = "SELECT * FROM staff WHERE email = '$email' AND password = '$password'";
        $result_staff = $conn->query($sql_staff);

        if ($result_staff->num_rows > 0) {
            echo "<script>
            alert('Welcome Staff');
            window.location.href = 'staff_dashboard.html';
            </script>";
        } else {
            echo "<script>
            alert('Invalid credentials');
            window.location.href ='login.html';</script>";
        }
    }
}

$conn->close();
?>

