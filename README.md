## Application Starter

Starter project built using the **Svelte** + **Tailwind CSS** + **Inertia.js** + **Laravel** stack. Here's what is in store:

### ✨ Features

-   Auth scaffolding using [Laravel Breeze](https://github.com/laravel/breeze)
-   Account settings & change password pages

### 🚀 Quick Start

> **Requires [Laravel Valet](https://laravel.com/docs/8.x/valet#installation)**

```bash
# Copy and configure environment
cp .env.example .env

# Install dependencies
composer install
npm install

# Built the frontend
npm run dev

# Valet link the application
valet link application-starter
valet secure

# Finally the app lives here: https://application-starter.test
```

### Testing

It is recommended to create a separate **MySQL** database for testing. The default configuration expects
that there is a `test` database accessible by user: `test:password`. If you are lazy:

1. Open MySQL: `$ mysql`
2. Create the **table** and the **user**:

    ```sql
    -- Create the test database
    CREATE DATABASE IF NOT EXISTS test;

    -- Create the test user
    CREATE USER 'test'@'%' IDENTIFIED BY 'password';
    GRANT CREATE, ALTER, INDEX, LOCK TABLES, REFERENCES, UPDATE, DELETE, DROP, SELECT, INSERT ON `test`.* TO 'test'@'%';
    FLUSH PRIVILEGES;
    ```

### Overriding environment

If you would like to configure your test environment variables, you can just `cp phpunit.xml.dist phpunit.xml`.
The `phpunit.xml` is not tracked in our version control so feel free to change the variables there.

### Running the tests

```bash
composer test
```
