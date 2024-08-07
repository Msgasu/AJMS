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


-- Create a table for statuses
CREATE TABLE status (
    status_id INT PRIMARY KEY AUTO_INCREMENT,
    status_name VARCHAR(50) UNIQUE
);

-- Insert predefined statuses
INSERT INTO status (status_name) VALUES ('pending'), ('completed'), ('dismissed');


-- Create a table for statements with a reference to the users table
CREATE TABLE statements (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT, -- Foreign key to reference the user who filled the form
    statement_description TEXT, -- For text descriptions
    document_url VARCHAR(255), -- For storing URLs of documents
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status_id INT, -- Foreign key to reference the status
    FOREIGN KEY (user_id) REFERENCES users(pid),
    FOREIGN KEY (status_id) REFERENCES status(status_id) -- Add foreign key constraint
);

-- Create a table for admins
CREATE TABLE admins (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE -- Store admin emails
);

CREATE TABLE meetings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    user_id INT, -- Foreign key to reference the user who schedules the meeting
    date DATE,
    time TIME,
    location VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(pid)
);

-- Insert admin users 
INSERT INTO admins (email) VALUES
('esther.gasu@ashesi.edu.gh'),
('david.ebo@ashesi.edu.gh');

