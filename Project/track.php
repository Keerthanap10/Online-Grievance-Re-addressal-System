<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $checkQuery = "SELECT * FROM track WHERE email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {  
        echo "<script>alert('Application in progress');
        window.location.href = 'track1.php'</script>";
    
}else {
  echo "<script>alert('Submit application');
  window.location.href = 'track1.php' </script>";
    }
}
$conn->close();
?>
