# TechShop Backend

![TechShop Logo](documentation-be/logo.png)

## Table of Contents

- [Project Overview](#project-overview)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Running](#running)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Technologies Used](#technologies-used)
- [Fronted Application](#frontend-application)
- [Contact Information](#contact-information)

## Project Overview

TechShop Backend (API) serves as the foundational component of the TechShop online shopping platform. Its primary purpose is to provide a set of APIs that follow the Model-View-Controller (MVC) pattern, offering essential data and functionality for the TechShop Frontend application.

TechShop Backend (API) plays a crucial role in the TechShop ecosystem, offering the following key functionalities:

- **Data Management:** It manages and organizes product data, user profiles, orders, and other essential information necessary for the operation of the TechShop online store.

- **API Endpoints:** It provides a comprehensive set of API endpoints that TechShop Frontend interacts with to fetch and manipulate data. These endpoints include product listings, order management, and more.

- **Email Notifications:** The backend also includes email notification functionality, sending completion emails to customers for their orders.

By following the MVC pattern, the backend API promotes separation of concerns, maintainability, and scalability. It acts as the bridge between the frontend and the database, facilitating seamless data exchange and user interactions within the TechShop platform.

## Getting Started

To get started with TechShop Backend (API) and run it on your local machine, follow these steps:

### Prerequisites

Before you begin, ensure you have the following prerequisites installed:

- **PHP**: Laravel 9 requires PHP. You can download it from [php.net](https://www.php.net/downloads.php).

- **Composer**: Laravel uses Composer for package management. You can install it from [getcomposer.org](https://getcomposer.org/download/).

- **Database**: Set up a database system of your choice (e.g., MySQL, PostgreSQL, SQLite) and create a database for the application.

- **Web Server**: You can use Laravel's built-in development server or set up a web server (e.g., Apache, Nginx) to serve the application.

### Installation

1. Clone the repository to your local machine using your preferred method (HTTPS or SSH):

   ```bash
   git clone https://github.com/vladimirstojcheski/tech-shop-be.git
   ```
2. Change your current directory to the project's root folder:

   ```bash
   cd tech-shop-be
   ```
3. Create a .env file by copying the example:

   ```bash
   cp .env.example .env
   ```
4. Open the .env file and configure your database connection settings.
5. Install the project dependencies using Composer:

   ```bash
   composer install
   ```
6. Generate a unique application key:

   ```bash
   php artisan key:generate
   ```
7. Run the database migrations to create the necessary tables:

   ```bash
   php artisan migrate
   ```
8. To host the images in the storage run:

   ```bash
   php artisan storage:link
   ```
9. Optionally, you can seed the database with sample data:

   ```bash
   php artisan db:seed
   ```

### Running

1. Once the installation is complete, you can start the development server:

   ```bash
   php artisan serve
   ```
The application will be available at http://localhost:8000.

## Usage

TechShop Backend (API) offers a set of API endpoints to interact with the application's data and functionality. Below is a list of available endpoints and their descriptions:

### Products

- **Get All Products**
  - Endpoint: `/products`
  - Method: GET
  - Description: Retrieve a list of all available products.

- **Get Products by Category**
  - Endpoint: `/products/{id}/all`
  - Method: GET
  - Description: Retrieve all products within a specific category identified by `{id}`.

- **Get Product by ID**
  - Endpoint: `/products/{id}`
  - Method: GET
  - Description: Retrieve detailed information about a specific product identified by `{id}`.

- **Create Product**
  - Endpoint: `/products/create`
  - Method: POST
  - Description: Create a new product.
  - Request Body: Include product details such as name, description, price, and any other required information.
  
    **Curl request**:
    
    ```bash
    curl --location --request POST 'http://localhost:8000/api/products/create' \
    --header 'Content-Type: multipart/form-data' \
    --form 'title="Test"' \
    --form 'description="test"' \
    --form 'price="200"' \
    --form 'category_id="2"' \
    --form 'manufacturer_id="1"' \
    --form 'img=@"path_to_your_image.jpg"'
    ```

### Orders

- **Get Order with Products**
  - Endpoint: `/order/{id}`
  - Method: GET
  - Description: Retrieve an order's details, including the products associated with it, identified by `{id}`.

- **Create Order**
  - Endpoint: `/order/create`
  - Method: POST
  - Description: Create a new order.
  - Request Body: Include order details, customer information, and the list of products in the order.
  
    **Example Request Body**:
    
    ```json
    {
        "first_name": "Name",
        "last_name": "Surname",
        "email": "email@example.com",
        "phone": "38971111111",
        "country": "Country",
        "city": "City",
        "streetName": "Streetname",
        "zip_code": "zip",
        "total_amount": "448",
        "products": [
            "10",
            "9",
            "8"
        ]
    }
    ```

### Categories

- **Get All Subcategories**
  - Endpoint: `/categories/sub/all`
  - Method: GET
  - Description: Retrieve a list of all subcategories.

- **Get All Categories**
  - Endpoint: `/categories/all`
  - Method: GET
  - Description: Retrieve a list of all main categories.

### Manufacturers

- **Get Manufacturers by Category**
  - Endpoint: `/manufacturers/{id}`
  - Method: GET
  - Description: Retrieve manufacturers associated with a specific category identified by `{id}`.

- **Get All Manufacturers**
  - Endpoint: `/manufacturers`
  - Method: GET
  - Description: Retrieve a list of all manufacturers.

### Filtering

- **Filter Products**
  - Endpoint: `/products/all`
  - Method: POST
  - Description: Filter products based on specific criteria.
  - Request Body: Specify filter criteria such as category or manufacturers.
  
    **Example Request Body**:
    
    ```json
    {
        "manufacturers": [4],
        "category": 1,
        "manufacturersToFilter": [
            1,
            2,
            3,
            4,
            1,
            1,
            1,
            1,
            4,
            2,
            4
        ],
        "query": ""
    }
    ```

For each endpoint, make HTTP requests using the appropriate method (GET or POST) and provide any required parameters or data in the request body, as indicated in the descriptions above.

TechShop Backend (API) empowers your frontend application by providing access to essential data and functionality through these endpoints. Use these endpoints to build dynamic and engaging user experiences within your TechShop platform.

## Project Structure

- **`app/`**: Contains the application's PHP code, including controllers, middleware, and providers.
  - `Http/`: Processes and defines requests
      - `Controllers/`: Application controllers
      - `Middleware/`: 
      - `Requests/`: Request models
  - `Models/`: Database models
  - `Providers/`: Vuex store modules for state management.

- **`bootstrap/`**: Responsible for bootstrapping and initializing the application.

- **`config/`**: Configuration files for various services and components.

- **`database/`**: Includes database migrations and seeders for database setup and population.

- **`public/`**: Publicly accessible assets such as CSS, JavaScript, and images.

- **`resources/`**: Contains Blade templates, language files, and views used in the application.

- **`routes/`**: Houses route definitions and route files that define application endpoints.

- **`storage/`**: Used for temporary and cache storage.

- **`tests/`**: PHPUnit test cases for automated testing.

- **`vendor/`**: Dependencies installed via Composer.

- **`.env`**: Environment-specific configuration file.

- **`.env.example`**: Example environment configuration file.

- **`.gitignore`**: Defines which files and directories should be ignored by Git.

- **`composer.json`**: Composer package and script definitions.

- **`phpunit.xml`**: PHPUnit configuration file.

- **`README.md`**: The documentation file you are currently reading.

This structured organization helps keep the codebase organized and maintainable, allowing for efficient development and scaling of the Laravel application.

## Technologies Used

TechShop Backend (API) is built using a variety of technologies and dependencies to ensure robustness and efficiency. The following technologies and packages are used in this project:

- **PHP 8.0.2**: The programming language used for developing the application.

- **Laravel Framework 9.19**: A powerful and popular PHP framework that provides tools and features for building web applications.

- **Laravel Tinker 2.7**: An interactive REPL (Read-Eval-Print Loop) for Laravel that aids in debugging and testing.

- **Spatie Laravel Ignition 1.0**: A package that provides detailed error pages and insights for debugging Laravel applications.

These technologies and packages collectively enable the development of a secure, efficient, and feature-rich backend API for the TechShop online shopping platform. They are essential components that contribute to the project's functionality and reliability.

## Frontend Application

TechShop Backend (API) serves as the foundation of our online shopping platform, providing essential data and functionalities. While this repository focuses on the backend component, it's important to note that we also have a dedicated frontend application that delivers the user interface and client-side experience.

If you're interested in exploring or contributing to the frontend component, you can find the associated repository here:

- **Frontend Repository**: [Link to Frontend Repository](https://github.com/vladimirstojcheski/tech-shop-fe)

Visiting the frontend repository will give you insights into its features, user interface design, and the technologies used to create an engaging online shopping experience. The synergy between the frontend and backend ensures a complete and user-friendly platform.

Feel free to check out the frontend repository to gain a holistic view of our online shopping solution and explore opportunities for collaboration in the frontend development.

## Contact Information

If you have any questions, suggestions, or feedback regarding TechShop Frontend, please feel free to reach out. We're here to help and improve the application.

- **Email**: [vladimir.stojcheski@students.finki.ukim.mk](mailto:vladimir.stojcheski@students.finki.ukim.mk)

- **GitHub**: [vladimirstojcheski](https://github.com/vladimirstojcheski)

Please don't hesitate to contact us. Your input is valuable to us, and we're always open to collaboration and contributions from the community.
