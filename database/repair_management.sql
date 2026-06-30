CREATE DATABASE repair_management;

USE repair_management;

CREATE TABLE users(

    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    role VARCHAR(20)

);

CREATE TABLE service_requests(

    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    appliance VARCHAR(100),
    problem TEXT,
    status VARCHAR(50)

);