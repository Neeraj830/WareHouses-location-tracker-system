<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Warehouse Management System</title>
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Warehouse Management System</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="add_warehouse.php">Add Warehouse</a></li>
                    <li><a href="search.php">Search Warehouse</a></li>
                    <li><a href="inventory.php">Inventory</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="showcase">
        <div class="container">
            <h1>Manage Your Warehouses Efficiently</h1>
            <p>Upload details about your warehouse and find the perfect warehouse according to your needs.</p>
        </div>
    </section>

    <div class="search-container">
        <input type="text" class="search-bar" placeholder="Search...">
        <button class="search-button">Search</button></br>
        <a href="booking_form.php"><button class="booking-button">Book a Warehouse</button></a>
        <a href="add_warehouse.php"><button class="add-warehouse-button">Add Warehouse</button></a>
    </div>
</body>
</html>
