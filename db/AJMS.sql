-- Drop and recreate the database if needed
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

-- Create a table for statements with a reference to the users table
CREATE TABLE statements (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT, -- Foreign key to reference the user who filled the form
    statement_description TEXT, -- For text descriptions
    document_url VARCHAR(255), -- For storing URLs of documents
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(pid) -- Add foreign key constraint
);
