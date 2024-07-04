<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Search Warehouse</title>
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

    <section id="main">
        <div class="container">
            <h1>Search Warehouse</h1>
            <form action="search.php" method="get">
                <label for="location">Location</label>
                <input type="text" name="location" id="location">

                <label for="min_size">Min Size (sqft)</label>
                <input type="number" name="min_size" id="min_size">

                <label for="max_rent">Max Rent (per month)</label>
                <input type="number" name="max_rent" id="max_rent">

                <input type="submit" value="Search">
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
                $location = $_GET['location'] ?? '';
                $min_size = $_GET['min_size'] ?? 0;
                $max_rent = $_GET['max_rent'] ?? PHP_INT_MAX;

                $sql = 'SELECT * FROM warehouses WHERE location LIKE ? AND size >= ? AND rent <= ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["%$location%", $min_size, $max_rent]);
                $warehouses = $stmt->fetchAll();

                if ($warehouses) {
                    echo '<table>';
                    echo '<tr><th>Name</th><th>Size (sqft)</th><th>Location</th><th>Rent ($)</th></tr>';
                    foreach ($warehouses as $warehouse) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($warehouse['name']) . '</td>';
                        echo '<td>' . htmlspecialchars($warehouse['size']) . '</td>';
                        echo '<td>' . htmlspecialchars($warehouse['location']) . '</td>';
                        echo '<td>' . htmlspecialchars($warehouse['rent']) . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo '<p>No warehouses found.</p>';
                }
            }
            ?>
        </div>
    </section>
</body>
</html>
