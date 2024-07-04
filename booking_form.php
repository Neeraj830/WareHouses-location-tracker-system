<?php
// Database connection parameters
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $warehouse = $_POST['warehouse'];
    $booking_date = $_POST['date'];
    $message = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO warehouse_bookings (name, email, phone, warehouse, booking_date, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $phone, $warehouse, $booking_date, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Warehouse</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        .booking-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }
        .booking-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .booking-form .form-group {
            margin-bottom: 15px;
        }
        .booking-form .form-group label {
            display: block;
            margin-bottom: 5px;
            margin-right: 10px;
        }
        .booking-form .form-group select{
            width: 500px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        .booking-form .form-group input,
        .booking-form .form-group textarea {
            width: 475px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        .booking-form .form-group textarea {
            resize: vertical;
        }
        .booking-form .form-group button {
            display: block;
    width: 100%;
    padding: 10px;
    background: #333;
    color: #fff;
    border: none;
    cursor: pointer;
        }
        .booking-form .form-group button:hover {
            background: #77aaff;
        }
    </style>
</head>
<body>
    <form class="booking-form" action="book_warehouse.php" method="post">
        <h2>Book a Warehouse</h2>
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="warehouse">Select Warehouse</label>
            <!-- <select id="warehouse" name="warehouse" required>
                <option value="">Choose...</option>
                <option value="warehouse1">Warehouse 1 - Mumbai, Maharashtra</option>
                <option value="warehouse2">Warehouse 2 - Pune, Maharashtra</option>
                <option value="warehouse3">Warehouse 3 - Bangalore, Karnataka</option>
                <!-- Add more options as needed -->
            </select> -->
        </div>
        <div class="form-group">
            <label for="date">Booking Date</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="message">Additional Information</label>
            <textarea id="message" name="message" rows="4"></textarea>
        </div>
        <div class="form-group">
            <button type="submit">Book Now</button>
        </div>
    </form>
</body>
</html>
