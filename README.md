# Home Appliance Repair Management System

A simple PHP/MySQL web application for managing appliance repair requests, users, and technician assignments.

## Overview

This project allows:
- Customers to register, log in, and book appliance repair services
- Admins to manage customers, technicians, requests, and generate reports
- Technicians to view assigned requests and update status
- File uploads for appliance images, invoices, and profile photos

## Features

- User registration and login
- Role-based dashboard for:
  - Customers
  - Technicians
  - Admin
- Service request booking with appliance details and image upload
- Request management and status updates
- Report generation and invoice export
- Basic authentication using PHP session handling

## Technology Stack

- PHP
- MySQL / MariaDB
- HTML / CSS
- Bootstrap (front-end styling)
- Font Awesome
- Google Fonts

## Installation

1. Copy the project folder to your local web server directory:
   - XAMPP: `C:\xampp\htdocs\Home appliance repair`
   - WAMP: `C:\wamp64\www\Home appliance repair`

2. Start Apache and MySQL.

3. Create the database:
   - Import `database/repair_management.sql` into MySQL.
   - If needed, ensure the `service_requests` table includes fields used by the application:
     - `brand`
     - `address`
     - `mobile`
     - `image`

4. Configure database connection:
   - Open `config/db.php`
   - Update MySQL credentials if required:
     ```php
     $conn = new mysqli("localhost","root","","repair_management");
     ```

5. Open the app in your browser:
   - `http://localhost/Home appliance repair/`

## Database Schema

### users
- `id`
- `name`
- `email`
- `password`
- `role`

### service_requests
- `id`
- `customer_id`
- `appliance`
- `brand`
- `problem`
- `address`
- `mobile`
- `image`
- `status`

## Project Structure

- `index.php` — main landing page
- `login.php`, `register.php`, `logout.php`
- `dashboard.php` — main dashboard
- `admin/` — admin pages
- `customer/` — customer pages (book service, my requests, feedback)
- `technician/` — technician pages
- `config/db.php` — database connection
- `includes/` — shared authentication and layout files
- `database/repair_management.sql` — database creation script
- `uploads/` — uploaded images and documents
- `reports/` — PDF export and invoice generation
- `assets/` — CSS, JS, images, Bootstrap

## Notes

- The app uses `md5()` for password hashing in the current code. For production use, upgrade to `password_hash()` and `password_verify()`.
- Default database connection uses `root` with no password. Update for your environment.
- Ensure file upload folders exist and are writable:
  - `uploads/appliance_images/`
  - `uploads/documents/`
  - `uploads/invoices/`
  - `uploads/profile_photos/`

## How to Use

1. Register as a user.
2. Log in.
3. Book a repair service as a customer.
4. Admin can log in and manage requests, users, and reports.
5. Technician can log in and update service status.

## License

Add your license information here if needed.