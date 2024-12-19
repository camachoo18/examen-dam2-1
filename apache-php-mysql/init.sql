CREATE DATABASE IF NOT EXISTS my_database;
USE users_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (name, password) VALUES ('Alice', 'password123');
INSERT INTO users (name, password) VALUES ('Bob', 'password456');
INSERT INTO users (name, password) VALUES ('Charlie', 'password789');