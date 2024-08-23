CREATE DATABASE student_management;

USE student_management;

CREATE TABLE academic_year (
    year_id INT AUTO_INCREMENT,
    year_title VARCHAR(50),
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    PRIMARY KEY (year_id)
) ENGINE=InnoDB;

CREATE TABLE sessions (
    session_id INT AUTO_INCREMENT,
    session_title VARCHAR(50),
    session_period VARCHAR(50),
    PRIMARY KEY (session_id)
) ENGINE=InnoDB;

CREATE TABLE students (
    matricule INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    second_name VARCHAR(50) NOT NULL,
    birth_date DATE NOT NULL,
    mutual_number VARCHAR(20),
    promotion VARCHAR(5) NOT NULL,
    faculty VARCHAR(50) NOT NULL,
    academic_year_id INT,
    session_id INT,
    PRIMARY KEY (matricule),
    FOREIGN KEY (academic_year_id) REFERENCES academic_year(year_id),
    FOREIGN KEY (session_id) REFERENCES sessions(session_id)
) ENGINE=InnoDB;

CREATE TABLE courses (
    course_code INT AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    credits INT NOT NULL,
    category VARCHAR(50) NOT NULL,
    session INT NOT NULL,
    PRIMARY KEY (course_code)
) ENGINE=InnoDB;
