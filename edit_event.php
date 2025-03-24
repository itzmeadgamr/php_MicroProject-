<?php

include 'db.php';
include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM events WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update_event'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $location = $_POST['location'];

    $sql = "UPDATE events SET 
            title='$title', 
            description='$description', 
            event_date='$event_date', 
            event_time='$event_time', 
            location='$location' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert success'>✅ Event updated successfully!</div>";
    } else {
        echo "<div class='alert error'>❌ Error updating event: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>✏️ Edit Event</h2>
        <form method="POST">
            <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
            <textarea name="description" required><?php echo $row['description']; ?></textarea>
            <input type="date" name="event_date" value="<?php echo $row['event_date']; ?>" required>
            <input type="time" name="event_time" value="<?php echo $row['event_time']; ?>" required>
            <input type="text" name="location" value="<?php echo $row['location']; ?>" required>
            <button type="submit" name="update_event">💾 Save Changes</button>
        </form>
    </div>
</body>
</html>
