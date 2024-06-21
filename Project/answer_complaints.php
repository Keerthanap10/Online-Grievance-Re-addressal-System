<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Services - Staff Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet.css">
    <style>
        /* Custom styles */
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Complaint Services</a>

        <!-- Toggler/collapsable Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <!-- Links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="staff_dashboard.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Welcome, Staff!</h1>
        <p>Manage complaints and track their status.</p>

        <!-- Display complaints table -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Complaint</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connect.php';

                $sql = "SELECT * FROM complaints";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['complaint']."</td>";
                        echo "<td><a href='answer_form.html?id=".$row['id']."'>Answer</a> | <a href='remove_complaint.php?id=".$row['id']."'>Remove</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No complaints found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
