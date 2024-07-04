
<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Inventory Management</title>
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
            <h1>Inventory Management</h1>
            <?php
            $sql = 'SELECT * FROM warehouses';
            $stmt = $pdo->query($sql);
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
                echo '<p>No warehouses available.</p>';
            }
            ?>
        </div>
    </section>
</body>
</html>
