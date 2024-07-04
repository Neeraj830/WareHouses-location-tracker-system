<?php
include 'includes/db.php';

header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'inventory':
        $sql = 'SELECT * FROM warehouses';
        $stmt = $pdo->query($sql);
        $warehouses = $stmt->fetchAll();
        echo json_encode($warehouses);
        break;
    
    case 'replenishment':
        // Example: Return warehouses with low stock (for demo purposes, setting a threshold of 1000 sqft)
        $threshold = 1000;
        $sql = 'SELECT * FROM warehouses WHERE size < ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$threshold]);
        $warehouses = $stmt->fetchAll();
        echo json_encode($warehouses);
        break;

    default:
        echo json_encode(['message' => 'Invalid action']);
        break;
}
?>
