<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $warehouse_id = $_POST['warehouse_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $booking_date = $_POST['date'];
    $message = $_POST['message'];

    // Check if the warehouse is already booked for the given date
    $stmt = $pdo->prepare('SELECT * FROM warehouse_bookings WHERE id = ? AND booking_date = ?');
    $stmt->execute([$warehouse_id, $booking_date]);
    $existing_booking = $stmt->fetch();

    if ($existing_booking) {
        echo "This warehouse is already booked for the selected date.";
    } else {
        // Insert the booking into the database
        $stmt = $pdo->prepare("INSERT INTO warehouse_bookings (id, name, email, phone, booking_date, message) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$warehouse_id, $name, $email, $phone, $booking_date, $message]);

        if ($stmt) {
            echo "Booking successful!";
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
}
?>
