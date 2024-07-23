-- Create database if not exists
DROP DATABASE IF EXISTS AJMS;
CREATE DATABASE IF NOT EXISTS AJMS;
USE AJMS;

-- Create a table for roles
CREATE TABLE roles (
    rid INT PRIMARY KEY,
    role_name VARCHAR(50)
);

-- Insert predefined roles (e.g., 'admin', 'user')
INSERT INTO roles (rid, role_name) VALUES (1, 'admin'), (2, 'user');

-- Create a table for users
CREATE TABLE users (
    pid INT PRIMARY KEY AUTO_INCREMENT,
    f_name VARCHAR(50),
    l_name VARCHAR(50),
    email VARCHAR(100),
    passwd VARCHAR(255),
    role_id INT DEFAULT 2, -- Default role is 'user'
    FOREIGN KEY (role_id) REFERENCES roles(rid)
);