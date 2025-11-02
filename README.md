# Catalog System API

A Laravel-based catalog system with categories and items, featuring user authentication and RESTful APIs.

## Setup Instructions

### Prerequisites
- PHP 8.2+
- Composer
- MySQL
- Laravel 12 +

### Installation

1. Clone the repository:
git clone https://github.com/shivkumarp/catalog-system.git
cd catalog-system

2. Install dependencies:
   composer install
  
3. Configure environment:

   cp .env.example .env
   php artisan key:generate  

4. Update .env file with your database credentials:

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=catalog_system
   DB_USERNAME=your_username
   DB_PASSWORD=your_password   

5. Run migrations and seeders and serve locally:

   php artisan migrate
   php artisan db:seed
   php artisan serve



## This API uses token-based authentication. Include the API token in the Authorization header as a Bearer token.

1. Register a new user: Post Method

  curl --location 'http://127.0.0.1:8001/api/auth/register' \
--form 'name="Shiv Kumar"' \
--form 'email="sk8597147@gmail.com"' \
--form 'password="12345678"' \
--form 'password_confirmation="12345678"'


resposnse : 


2. Login: Post Method

curl --location 'http://127.0.0.1:8001/api/auth/login' \
--form 'email="sk8597147@gmail.com"' \
--form 'password="12345678"'

3. Get All Categories: Get method
  
curl --location 'http://127.0.0.1:8001/api/categories' \
--header 'Authorization: Bearer mXAEIOPBQl8tyjJ3EFHuDLyuhWRlznpR9g6kLg3W338Owdk6jEm4irOV8R4K'

4. Get Categories Items : Post Method
  
  curl --location 'http://127.0.0.1:8001/api/categories/sports/items' \
--header 'Authorization: Bearer mXAEIOPBQl8tyjJ3EFHuDLyuhWRlznpR9g6kLg3W338Owdk6jEm4irOV8R4K' \
--form 'min_price="50"' \
--form 'max_price="100"' \
--form 'q="search"' \
--form 'sort="price_asc"' \
--form 'per_page="10"'



```bash


## Setup Instructions
  