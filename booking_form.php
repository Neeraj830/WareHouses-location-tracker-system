<?php include 'includes/db.php'; ?>
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
    <?php
    if (isset($_GET['id'])) {
        $warehouse_id = $_GET['id'];

        // Fetch warehouse details from the database
        $stmt = $pdo->prepare('SELECT * FROM warehouses WHERE id = ?');
        $stmt->execute([$warehouse_id]);
        $warehouse = $stmt->fetch();

        if ($warehouse) {
            echo '<form class="booking-form" action="process_booking.php" method="post">
                    <h2>Book a Warehouse</h2>
                    <input type="hidden" name="warehouse_id" value="' . htmlspecialchars($warehouse['id']) . '">
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
                </form>';
        } else {
            echo '<p>Warehouse not found.</p>';
        }
    } else {
        echo '<p>No warehouse selected.</p>';
    }
    ?>
</body>
</html>
