# Test Intern Inagata Backend API Documentation

## Overview
This project is a RESTful API built with Laravel 11 for managing financial transactions. It provides endpoints for user authentication, profile management, and transaction handling with secure authentication using Laravel Sanctum.

## Tech Stack
- PHP 8.3
- Laravel 11
- MySQL 8.30
- Laragon (Development Environment)
- Laravel Sanctum (Authentication)

## System Requirements
- PHP >= 8.3
- Composer
- MySQL >= 8.30
- Laragon or similar development environment

## Installation

1. Clone the repository
```bash
git clone https://github.com/achmichael/test-intern-inagata.git
cd test-intern-inagata
```

2. Install dependencies
```bash
composer install
```

3. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database in `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1 or localhost
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Run migrations and seeders
```bash
php artisan migrate
php artisan db:seed
```

6. Start the development server
```bash
php artisan serve
```

## API Documentation

### Authentication

#### Login
```
POST /api/login
```

**Request Body:**
```json
{
    "email": "example@gmail.com",
    "password": "example#123"
}
```

**Response:** 
![response_login](/storage/app/public/response/login.png)

### Profile Management

#### Get Profile
```
GET /api/profile
```
**Headers Required:**
- Authorization: Bearer {token}

**Response:**
![response_get_profile](/storage/app/public/response/getProfile.png)

#### Update Profile
```
PUT /api/profile
```
**Headers Required:**
- Authorization: Bearer {token}

**Request Body:**
```json
{
    "email": "coba1@gmail.com",
    "password": "coba#123"
}
```

**Response:**

![response_update_profile](/storage/app/public/response/updateProfile.png)

### Transaction Management

#### Add Transaction
```
POST /api/transaction
```
**Headers Required:**
- Authorization: Bearer {token}

**Request Body:**
```json
{
    "type": "income",
    "amount": 50,
    "description": "nemu dijalan"
}
```

**Response:** 

![response_add_transaction](/storage/app/public/response/addTransaksi.png)

#### Update Transaction
```
PUT /api/transaction/{id}
```
**Headers Required:**
- Authorization: Bearer {token}

**Request Body:**
```json
{
    "type": "expense",
    "amount": 5000,
    "description": "Updated description"
}
```

**Response:**

![response_update_transaksi](/storage/app/public/response/updateTransaksi.png)

#### List User Transactions
```
GET /api/user/transaction
```
**Headers Required:**
- Authorization: Bearer {token}

**Response:**

![response_get_list_user_and_transaction](/storage/app/public/response/TransaksiUser.png)

## Authentication Details (Laravel Sanctum)

Laravel Sanctum provides a lightweight authentication system for SPAs and simple API tokens. It handles:
- API token authentication
- SPA authentication
- Mobile application authentication

For more details about Sanctum, visit the [official documentation](https://laravel.com/docs/11.x/sanctum).

## Additional Resources

### Laravel 11 Documentation
- [Official Laravel 11 Documentation](https://laravel.com/docs/11.x)
- [Laravel 11 Release Notes](https://laravel.com/docs/11.x/releases)
- [Laravel Sanctum Documentation](https://laravel.com/docs/11.x/sanctum)

### Key Features in Laravel 11
- Improved performance
- PHP 8.3 support
- Enhanced type hinting
- Improved error handling
- Better testing capabilities



---
Made with ❤️ using Laravel 11
