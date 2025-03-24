<?php

include 'db.php';
include 'header.php';

$sql = "SELECT * FROM events ORDER BY event_date ASC";
$result = $conn->query($sql);
?>

<div class="container">
    <h1>⚙️ Manage Events</h1>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="event-card">
            <h2><?php echo $row['title']; ?></h2>
            <p><?php echo $row['description']; ?></p>
            <p><strong>Date:</strong> <?php echo $row['event_date']; ?></p>
            <p><strong>Time:</strong> <?php echo $row['event_time']; ?></p>
            <p><strong>Location:</strong> <?php echo $row['location']; ?></p>

            <a class="btn edit" href="edit_event.php?id=<?php echo $row['id']; ?>">✏️ Edit</a>
            <a class="btn delete" href="delete_event.php?id=<?php echo $row['id']; ?>" 
               onclick="return confirm('Are you sure you want to delete this event?')">
               🗑️ Delete
            </a>
        </div>
        <div class="pdf-email-options">
            <a href="generate_pdf.php" class="btn pdf">📄 Generate and Send PDF</a>
        </div>

    <?php } ?>
</div>
