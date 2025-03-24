<?php
include 'db.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM events WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert success'>🗑️ Event deleted successfully!</div>";
    } else {
        echo "<div class='alert error'> Error deleting event: " . $conn->error . "</div>";
    }
}
header("Location: admin.php");
?>
