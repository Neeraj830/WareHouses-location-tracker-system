-- Create the database
CREATE DATABASE IF NOT EXISTS warehouse_management;

-- Use the database
USE warehouse_management;

-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Password VARCHAR(255) NOT NULL
);

-- Create the warehouses table
CREATE TABLE IF NOT EXISTS warehouses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    size VARCHAR(50) NOT NULL,
    location VARCHAR(255) NOT NULL,
    rent DECIMAL(10, 2) NOT NULL
);

-- Create the warehouse_bookings table
CREATE TABLE IF NOT EXISTS warehouse_bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    warehouse VARCHAR(100) NOT NULL,
    booking_date DATE NOT NULL,
    message TEXT
);

-- Example insert statements (commented out)
-- INSERT INTO `users` (`Id`, `Username`, `Email`, `Password`) VALUES (NULL, 'john_doe', 'john@example.com', 'hashed_password_here');
-- INSERT INTO `warehouses` (`id`, `name`, `size`, `location`, `rent`) VALUES (NULL, 'Warehouse 1', '1000 sqft', 'Location 1', 1500.00);
-- INSERT INTO `warehouse_bookings` (`id`, `name`, `email`, `phone`, `warehouse`, `booking_date`, `message`) VALUES (NULL, 'John Doe', 'john@example.com', '1234567890', 'Warehouse 1', '2024-07-01', 'Looking forward to using this space.');

