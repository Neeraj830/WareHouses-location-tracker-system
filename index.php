<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Warehouse Location Tracker System</title>
</head>
<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>Warehouse Location Tracker System</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="add_warehouse.php">Add Warehouse</a></li>
                        <li><a href="search.php">Search Warehouse</a></li>
                        <li><a href="inventory.php">Inventory</a></li>
                        <li><a href="./form/logout.php">Logout</a></li>
                        <?php echo "User: " . $_SESSION['username']; // Debugging statement ?>
                    <?php else: ?>
                        <li><a href="./form/login.php">Login</a></li>
                        <li><a href="./form/register.php">Register</a></li>
                        <?php echo "Not logged in"; // Debugging statement ?>
                    <?php endif; ?>
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
</body>
</html>
