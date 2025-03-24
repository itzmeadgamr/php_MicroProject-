<?php
include 'db.php';
include 'header.php';

$sql = "SELECT * FROM events ORDER BY event_date ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Event Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>📅 Upcoming Events</h1>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="event-card">
                <h2><?php echo $row['title']; ?></h2>
                <p><?php echo $row['description']; ?></p>
                <p><strong>Date:</strong> <?php echo $row['event_date']; ?></p>
                <p><strong>Time:</strong> <?php echo $row['event_time']; ?></p>
                <p><strong>Location:</strong> <?php echo $row['location']; ?></p>
            </div>
        <?php } ?>
    </div>
</body>
</html>
