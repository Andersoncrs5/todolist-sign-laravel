# Laravel Task Management System

## Description
This project is a simple task management system built with Laravel 12. It includes two CRUD operations: one for user management and another for task management. The system also features a basic authentication mechanism using session-based authentication.

## Features
- Laravel 12
- MySQL 8
- PHP 8.4.4
- User CRUD
- Task CRUD
- Basic authentication with session
- Form validation
- Middleware for route protection
- Mvc

## Future Enhancements
- Pagination for task lists
- Integration with Laravel Breeze for improved authentication and user management

## Installation
1. Clone this repository:
   ```sh
   git clone https://github.com/your-repo/task-management.git
   ```
2. Navigate to the project directory:
   ```sh
   cd task-management
   ```
3. Install dependencies:
   ```sh
   composer install
   ```
4. Configure the `.env` file:
   ```sh
   cp .env.example .env
   ```
   Update database credentials in `.env` file.
5. Run migrations:
   ```sh
   php artisan migrate
   ```
6. Start the development server:
   ```sh
   php artisan serve
   ```

## Usage
- Register a new user
- Log in using session-based authentication
- Create, update, and delete tasks
- Manage user accounts

## License
This project is open-source and available under the [MIT License](LICENSE).

