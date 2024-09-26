# Employee Management System (Employee Module Simple Crud)

## Project Overview

This is built with **Laravel** and styled using **Bootstrap**. It follows best practices, including the **Repository Pattern**, **Service Layer**, and **Form Request Validation** to maintain clean and efficient code. The system allows managing employees with CRUD functionalities such as Add, Edit, Delete, and Search, along with Pagination and Image uploads.

## Features

1. **Add Employee**:
   - Form to add a new employee with fields such as Name, Email, Phone, Date of Birth, and Image Upload.
   - Validations:
     - Email should be unique.
     - Phone number should be numeric.
     - Image formats restricted to `jpg`, `jpeg`, `png`.

2. **Edit Employee**:
   - Update existing employee details, including the ability to update the profile image.

3. **Delete Employee**:
   - Delete an employee record from the system.

4. **List Employees**:
   - Displays a paginated list of all employees, with options to edit or delete.

5. **Search Employees**:
   - Search employees by their name.

6. **Pagination**:
   - Handle large employee datasets using pagination.

## Setup Instructions

### Prerequisites

Ensure that your system meets the following requirements:
- **PHP 8.1+**
- **Composer** (PHP dependency manager)
- **MySQL** (or any other preferred database)
### 1. Clone the Repository

First, clone the repository from the version control system to your local machine:

```bash
git clone <repository-url>
cd employee-management-system
```

### 2. Install depedency Via composer
```bash
composer install
cp .env.example .env
```
### 3. For database connection update below config in .env
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_management
DB_USERNAME=root
DB_PASSWORD=
```
### 4. Genearte application key
```bash
php artisan key:generate
```

### 5. Migrate the Database & Seed the Database
```bash
php artisan migrate
php artisan db:seed
```

### 6. Serve the Application
```bash
php artisan serve
You can now access the application in your browser at http://localhost:8000.
To access employees module please access below route
http://127.0.0.1:8000/employees
```

### 7. Routes to Access the Application

Once the server is up and running, you can access the application by opening your browser and navigating to:
http://localhost:8000


To directly access the employees module, use the following route:

http://127.0.0.1:8000/employees

### Note

This application does not include any authentication or user management features. Anyone with access to the application URL can manage employees without requiring login credentials.



