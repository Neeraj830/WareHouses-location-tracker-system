<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Add Warehouse</title>
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
            <h1>Add Warehouse</h1>
            <form action="add_warehouse.php" method="post">
                <label for="name">Warehouse Name</label>
                <input type="text" name="name" id="name" required>

                <label for="size">Size (sqft)</label>
                <input type="number" name="size" id="size" required>

                <label for="location">Location</label>
                <input type="text" name="location" id="location" required>

                <label for="rent">Rent (per month)</label>
                <input type="number" name="rent" id="rent" required>

                <input type="submit" value="Add Warehouse">
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $size = $_POST['size'];
                $location = $_POST['location'];
                $rent = $_POST['rent'];

                $sql = 'INSERT INTO warehouses (name, size, location, rent) VALUES (?, ?, ?, ?)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$name, $size, $location, $rent]);

                echo '<p>Warehouse added successfully!</p>';
            }
            ?>
        </div>
    </section>
</body>
</html>
