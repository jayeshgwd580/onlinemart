<h1>Online Mart</h1>
<h5>Welcome to OnlineMart!<h5>
<p>This document guides you to <strong>clone, set up, and run</strong> the OnlineMart project locally.</p>

## 1. Requirements

Before starting, make sure you have the following installed on your system:

- **PHP >= 8.0** (with required extensions: `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`)  
- **Composer** (PHP dependency manager)  
- **MySQL / MariaDB** database  
- **Node.js & npm** (if you want to compile assets, optional)  
- **Git**  
- **Laravel CLI** (optional but recommended)

---

## 2. Clone the Repository
**Open your terminal and run:** <br>
   git clone https://github.com/jayeshgwd580/onlinemart.git <br>
   cd onlinemart

## 3. Install Dependencies
    composer install
 
 **This will install all PHP dependencies.** <br>

     npm install
     npm run dev

## 4. Environment Setup

  **Copy the example environment file:** <br>
    cp .env.example .env

    Open .env file and set your local database configuration:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=onlinemart
    DB_USERNAME=root
    DB_PASSWORD=your_db_password

## 5. Generate Laravel application key:
    php artisan key:generate

## 6. Database Setup
   **Create a new database:** <br>
      CREATE DATABASE onlinemart;

   **Run migrations:** <br>
      php artisan migrate 

This will create all tables (users, products, carts, product_images, etc.)

## 7. Storage Setup
   **Link the storage folder for product images:** <br>
      php artisan storage:link

## 8. Running the Project
   **Start the local development server:** <br>
      php artisan serve

   **Visit the project in browser:** <br>
    -- http://127.0.0.1:8000

## 9. Default User
    Register a new user using the Register page.
    Admin user can be added manually in the database if needed.

## 10. Features
    User authentication (login/register)
    Product CRUD operations
    Add to cart functionality
    Admin panel to manage users & products
    Responsive UI for desktop & mobile
    Product images support with fallback image
    Session-based login
    Role-based access (normal user vs admin)

## 11 Adding Products
    Login as a user → Go to Add Product
    Fill product details + upload images
    Click Submit → Product saved in database

## 12 Cart Functionality
    user can click Add to Cart
    Cart table stores user_id, product_id, and quantity
    User can manage all products in cart

## 13 Notes
    Do not upload .env file to GitHub
    All sensitive info is in .env
    Public storage files (images) are linked via php artisan storage:link

## 14 Troubleshooting
   **Images not showing** <br>

      Run php artisan storage:link and check product_images table
   **404 error on route** <br>

      Check web.php routes and ensure middleware auth applied
   **Database errors** <br>	

      Check .env DB settings and run php artisan migrate:fresh if needed

## 15 Contribution
    Fork the repository
    Clone → make changes → create pull request
    Follow coding standards and proper commit messages

Project by: Jayesh B. Gawade
GitHub: https://github.com/jayeshgwd580/onlinemart.git