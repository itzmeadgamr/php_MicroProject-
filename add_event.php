<?php
include 'db.php';
include 'header.php';

if (isset($_POST['add_event'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $location = $_POST['location'];

    $sql = "INSERT INTO events (title, description, event_date, event_time, location) 
            VALUES ('$title', '$description', '$event_date', '$event_time', '$location')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert success'>🎉 Event added successfully!</div>";
    } else {
        echo "<div class='alert error'>❌ Error adding event: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>📝 Add New Event</h2>
        <form method="POST">
            <input type="text" name="title" placeholder="Event Title" required>
            <textarea name="description" placeholder="Event Description" required></textarea>
            <input type="date" name="event_date" required>
            <input type="time" name="event_time" required>
            <input type="text" name="location" placeholder="Event Location" required>
            <button type="submit" name="add_event">➕ Add Event</button>
        </form>
    </div>
</body>
</html>
