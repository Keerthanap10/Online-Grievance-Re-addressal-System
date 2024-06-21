<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Application Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
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
                    <a class="nav-link" href="cform.html">Submit Complaint</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="track1.php">Track Complaint</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h2 class="text-center">Track Application Status</h2>
        <form action="track.php" method="post">
            <div class="form-group">
                <label for="email">Enter your Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Track Status</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Complaint</th>
                <th>Reply</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include 'connect.php';

                $sql = "SELECT * FROM complaints WHERE reply IS NOT NULL";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['complaint']."</td>";
                        echo "<td>".$row['reply']."</td>";
                        echo "</tr>";
                }
            } else {
                    echo "No complaints with replies found";
}

$conn->close();
?>
 </tbody>
        </table>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>
