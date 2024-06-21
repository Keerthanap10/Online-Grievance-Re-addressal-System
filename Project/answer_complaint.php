<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $reply = $_POST['reply'];

    // Update the reply column in the complaints table
    $sql = "UPDATE complaints SET reply = '$reply' WHERE id = $id";

    if ($conn->query($sql) === TRUE){
        $delete_sql = "DELETE FROM track WHERE id = $id";
        if ($conn->query($delete_sql) === TRUE){
        echo "<script>alert('Complaint answered successfully');
        window.location.href='staff_dashboard.html'</script>";
    } 
}else {
        echo "<script>alert('Error answering complaint');</script>";
    }

    $conn->close();
}
?>
