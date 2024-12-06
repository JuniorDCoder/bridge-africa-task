# Bridge Africa Ventures - Online Marketplace

## Project Overview

Bridge Africa Ventures is a company that helps businesses create digital identities. They aim to build an online marketplace platform, **[www.bridgeafrica.com](http://www.bridgeafrica.com)**, where people can expose their products. The platform allows users to manage their store section (products) through CRUD operations. As part of this project, i am building the online marketplace where business owners can:

-   **Login**
-   **Logout**
-   **Sign In**
-   **Create, Read, Update, Delete Products**

This repository contains the codebase for the **Bridge Africa Ventures Marketplace**, built with Laravel 11 and Vue.js, implementing the required user and product management functionalities.

---

## Features

-   **User Authentication**: Login, logout, and sign-up functionalities.
-   **Product Management**: CRUD operations (Create, Read, Update, Delete) for managing products.
-   **Simple UI**: A minimal and functional interface built with **Vue.js** and **Tailwind CSS** for testing and user interaction.
-   **Database**: Uses MySQL to store user and product data.
-   **Backend**: Built with **Laravel 11**.

---

## Technologies Used

-   **Frontend**: Vue.js, Tailwind CSS
-   **Backend**: Laravel 11
-   **Database**: MySQL
-   **Authentication**: Laravel Breeze with Inertia.js for seamless Vue.js integration
-   **Server**: Apache

---

## Installation and Setup

### Prerequisites

Ensure the following tools are installed:

-   **PHP 8.1+** (compatible with Laravel 11)
-   **Composer**
-   **MySQL** (for database)
-   **Node.js and NPM** (for frontend dependencies)
-   **Apache** (as the server)

### Clone the Repository

```bash
git clone https://github.com/JuniorDCoder/bridge-africa-task.git
cd /bridge-africa-task
```

### Set Up Backend (Laravel)

1. **Install Dependencies**:

    Run the following commands to install PHP dependencies:

    ```bash
    composer install
    ```

2. **Set Up Environment**:

    Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

    Edit the `.env` file to match your database credentials (MySQL).

3. **Generate Application Key**:

    Generate the application key for Laravel:

    ```bash
    php artisan key:generate
    ```

4. **Migrate Database**:

    Create the necessary tables:

    ```bash
    php artisan migrate
    ```

### Set Up Frontend (Vue.js + Tailwind CSS)

1. **Install Node Dependencies**:

    Install the required JavaScript dependencies:

    ```bash
    npm install
    ```

2. **Run Development Server**:

    Compile the frontend assets and run the server:

    ```bash
    npm run dev
    ```

### Set Up Apache Server

Ensure your **Apache** server is properly configured to serve the Laravel application. Make sure `mod_rewrite` is enabled and configure your `.htaccess` file as needed.

---

## Features Implementation

### User Authentication (Login, Logout, Sign In)

Using **Laravel Breeze** with **Inertia.js** integration:

-   **Sign In**: Users can create an account with an email and password.
-   **Login**: Users can log in with their credentials.
-   **Logout**: Users can log out from the platform.

### Product Management (CRUD Operations)

-   **Create**: Business owners can add products to their store.
-   **Read**: Users can view the details of products available in the store.
-   **Update**: Owners can update product information.
-   **Delete**: Owners can remove products from their store.

---

## MVC Model

Icreated an **MVC** structure for user and product management, ensuring separation of concerns and making it easy to maintain and extend the application.

The following models were used:

-   **User Model**: Handles user authentication and basic account management.
-   **Product Model**: Handles CRUD operations for products.

### UML Sequence Diagram

A **UML sequence diagram** Found inside public folder, was used to model the flow of user actions (e.g., sign in, product management) across the system.

---

## Project Structure

```plaintext
bridge-africa-marketplace/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   └── ProductController.php
│   ├── Models/
│   │   ├── User.php
│   │   └── Product.php
│   └── Providers/
│       └── AppServiceProvider.php
│
├── resources/
│   ├── js/
│   │   ├── Components/
│   │   │   └── ProductList.vue
│   │   └── Pages/
│   │       └── Dashboard.vue
│   ├── views/
│   │   └── welcome.blade.php
│
│
├── routes/
│   └── web.php
│
└── .env.example
└── tailwind.config.js
```

---

## Usage

1. **Start the Application**:

    After setting up the database and running the development server, you can access the application at:

    ```
    http://localhost
    ```

2. **Login/Sign Up**:

    - Navigate to `/login` for existing users to sign in.
    - Navigate to `/register` to create a new account.

3. **Product Management**:

    After logging in, business owners can manage their products via the `/dashboard` page.

    - **Create**: Add new products.
    - **Read**: View product details.
    - **Update**: Edit product information.
    - **Delete**: Remove products from the system.

---

## Expectations

1. **PDF File**: A PDF containing the **MVC model** of the system and a **UML sequence diagram** to explain the flow of actions.
2. **GitHub Repository**: A public repository with the code for the project, which you can clone using the link provided.
3. **Production Environment**: Ensure that the code works on an Apache server in a production environment with MySQL as the database.

---

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## Authors

-   **Foryoung Junior Ngu** -Developer
    -   GitHub: [@JuniorDCoder](https://github.com/JuniorDCoder)

---

Feel free to clone, modify, and contribute to this repository. Happy coding!
