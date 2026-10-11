# TFA2 POS System

A four-page Point-of-Sale (POS) project built with CodeIgniter 4.7 and PHP. The customer and user account pages retrieve their records from a local MySQL database through CodeIgniter models.

## Requirements

- PHP 8.2 or later with the `intl`, `mbstring`, and `mysqli` extensions enabled
- Composer (needed when installing dependencies; the repository may also include `vendor/` locally)
- MySQL or MariaDB, such as the MySQL service provided by XAMPP
- Apache (XAMPP) or the CodeIgniter development server

## Local setup

1. Place or clone the project at `C:\xampp\htdocs\webtech\TFA1` for the default XAMPP URL below. If dependencies are not present, run `composer install` from the project directory.
2. Start MySQL in the XAMPP Control Panel. Create/import the database using either method:
   - In phpMyAdmin, choose **Import**, select `database/tfa2_pos.sql`, and run the import. The script creates and selects the `tfa2_pos` database and its sample tables.
   - Or from Command Prompt or Git Bash with the MySQL client available, run `mysql -u root -p < database/tfa2_pos.sql` from the project directory. Omit `-p` if your local MySQL root account has no password.
3. Copy `.env.example` to `.env` if `.env` does not already exist. Keep your existing unrelated `.env` settings and set these values to match your local MySQL account:

   ```ini
   database.default.hostname = localhost
   database.default.database = tfa2_pos
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.DBPrefix =
   database.default.port = 3306
   ```

   The checked-in example assumes XAMPP's common local setup: user `root`, no password. If your account differs, fill in its username and password in your local, ignored `.env`; do not commit credentials. The database name must match the one created by the SQL export.
4. Set `app.baseURL` in `.env` to the URL used to access the project. The default is `http://localhost/webtech/TFA1/`.
5. Start Apache and open `http://localhost/webtech/TFA1/`, or run `php spark serve` and use the local URL printed by CodeIgniter.

## Routes

| Route | Purpose |
| --- | --- |
| `/` | POS landing page |
| `/about` | Project information |
| `/customers` | Customer account listing from MySQL |
| `/users` | Staff user account listing from MySQL |

## Repository contents

- `app/Config/Routes.php` maps the application routes.
- `app/Controllers/` prepares page data; `app/Models/CustomerModel.php` and `UserModel.php` read account records with CodeIgniter's model/Query Builder methods.
- `app/Views/` contains the pages and shared layout.
- `database/tfa2_pos.sql` creates the database and sample customer/user records.
- `.env.example` documents local environment settings. The real `.env` is ignored by Git and must remain local.
- `composer.json` and `composer.lock` describe the installed CodeIgniter dependencies.

The SQL export reuses the five customer records and five staff names, usernames, and roles already present in TFA1. The `users` table keeps the assignment's required columns and includes a `role` column so the existing User Accounts page can continue displaying roles.

## Submission and deployment

Publish the raw project and SQL export to your GitHub repository, then deploy the application to your chosen host and verify the hosted routes and database connection yourself. This repository has not been published and the application has not been deployed by this setup guide.

## Local verification checklist

1. Open `/`, `/about`, `/customers`, and `/users` and confirm navigation works.
2. Confirm `/customers` displays the five imported customers and `/users` displays the five staff accounts with their existing roles.
3. Confirm `.env` points to the imported database and that the hosted environment has its own matching database and environment settings.
