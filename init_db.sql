-- Create database and user with high privileges
CREATE DATABASE IF NOT EXISTS payment_db;
USE payment_db;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50),
    balance DECIMAL(10,2)
);

INSERT INTO users (username, balance) VALUES ('alice', 100.00), ('bob', 50.00);

-- (Optional) Grant high privileges to root or a test user for RCE demonstration
GRANT ALL PRIVILEGES ON payment_db.* TO 'root'@'localhost';
FLUSH PRIVILEGES;
