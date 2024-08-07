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
INSERT INTO roles (rid, role_name) VALUES (1, 'admin'), (2, 'student');

-- Create a table for users
CREATE TABLE users (
    pid INT PRIMARY KEY AUTO_INCREMENT,
    f_name VARCHAR(50) ,
    l_name VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    passwd VARCHAR(255),
    role_id INT DEFAULT 2, -- Default role is 'user'
    FOREIGN KEY (role_id) REFERENCES roles(rid)
);

-- ALTER TABLE users ADD COLUMN first_login BOOLEAN DEFAULT TRUE;

ALTER TABLE users ADD COLUMN first_login BOOLEAN DEFAULT TRUE;
ALTER TABLE users ADD COLUMN student_id VARCHAR(20) DEFAULT NULL;
ALTER TABLE users ADD COLUMN participant VARCHAR(20) DEFAULT NULL;
ALTER TABLE users ADD COLUMN profile_picture VARCHAR(255);


-- Create a table for statuses
CREATE TABLE status (
    status_id INT PRIMARY KEY AUTO_INCREMENT,
    status_name VARCHAR(50) UNIQUE
);

-- Insert predefined statuses
INSERT INTO status (status_name) VALUES ('pending'), ('completed'), ('dismissed');


-- Create a table for statements with a reference to the users table
CREATE TABLE cases (
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

-- Create a table for case parties
CREATE TABLE case_parties (
    id INT PRIMARY KEY AUTO_INCREMENT,
    case_id INT, -- Foreign key to reference the case
    student_email VARCHAR(100), -- To store the email of the student
    FOREIGN KEY (case_id) REFERENCES cases(id) -- Reference to the cases table
    -- FOREIGN KEY (student_email) REFERENCES users(email) -- Reference to the users table
);

CREATE TABLE statements (
    id INT PRIMARY KEY AUTO_INCREMENT,
    case_id INT, -- Foreign key to reference the case
    user_id INT, -- Foreign key to reference the user who made the statement
    statement_description TEXT, -- For text descriptions
    document_url VARCHAR(255), -- For storing URLs of documents
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (case_id) REFERENCES cases(id),
    FOREIGN KEY (user_id) REFERENCES users(pid) -- Reference to the users table
);

-- Create a table for reminders
CREATE TABLE reminders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT, -- Foreign key to reference the user who created the reminder
    reminder_date DATE,
    reminder_time TIME,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(pid) -- Reference to the users table
);

-- Create the updated archive table with statement_id
CREATE TABLE archive (
    archive_id INT PRIMARY KEY AUTO_INCREMENT, -- Unique identifier for the archive record
    case_id INT, -- Case ID being archived
    case_statement TEXT, -- Case statement description
    party_email VARCHAR(100), -- Email of the party involved
    party_role VARCHAR(50), -- Role of the party involved
    statement_id INT, -- Unique identifier for each individual statement
    statement TEXT, -- Individual statement
    archived_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp for when the case is archived
    FOREIGN KEY (case_id) REFERENCES cases(id), -- Foreign key to ensure the case exists
    FOREIGN KEY (statement_id) REFERENCES statements(id) -- Foreign key to ensure the statement exists
);


-- Insert admin users 
INSERT INTO admins (email) VALUES
('esther.gasu@ashesi.edu.gh'),
('david.ebo@ashesi.edu.gh');

