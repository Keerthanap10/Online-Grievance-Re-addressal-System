<?php
include 'connect.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($username) || empty($email)) {
    echo "Please fill in all fields.";
} else {
    // Check if the user already exists
    $checkUserQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkUserQuery);

    if ($result->num_rows > 0) {
        // User already exists

        // JavaScript alert
        echo "<script>
                alert('User already exists. Redirecting to login page.');
                window.location.href = 'login.html'; // Redirect to login page
              </script>";
    } else {
        // User does not exist, proceed with registration

        // SQL query to insert data into the database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful

            // JavaScript success alert
            echo "<script>
                    alert('Registration successful! Redirecting to login page.');
                    window.location.href = 'login.html'; // Redirect to login page
                  </script>";
        } 
    }
}

// Close the database connection
$conn->close();
?>

