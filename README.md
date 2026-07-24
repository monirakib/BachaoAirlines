# Bachao Airlines

A flight booking web application built with the Laravel framework. Customers can search flights, book seats, apply travel insurance, earn reward points, and manage their membership tier; admins get a full back-office panel to manage flights, users, and bookings.

## Features

- **Flight search & booking** — search by source/destination, pick a seat from an interactive seat map, choose a travel insurance plan, and pay via bKash, Nagad, or Rocket.
- **Accounts & auth** — registration, login, password reset, and profile management.
- **Rewards & membership** — points earned on login and booking, with Bronze/Silver/Gold membership tiers.
- **Promotions** — browse promo codes and view their terms & conditions.
- **Customer support** — feedback submission with star ratings, and an FAQ suggestion box.
- **Admin panel** — dashboard with revenue/booking stats, and full CRUD for flights, users, and bookings (with safeguards like "can't delete your own account" and "can't delete an Admin").

## Tech Stack

- **Backend:** PHP 8.3, Laravel 13
- **Database:** MySQL / MariaDB
- **Frontend:** Blade templates, vanilla CSS/JS
- **Auth:** Laravel's built-in session auth + Sanctum

## Getting Started

### Requirements

- PHP 8.3+
- Composer
- MySQL/MariaDB (e.g. via XAMPP)

### Setup

1. Clone the repo and install dependencies:
   ```bash
   git clone https://github.com/monirakib/BachaoAirlines.git
   cd BachaoAirlines
   composer install
   ```

2. Copy the environment file and generate an app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. Create a database named `bachao_airlines` (e.g. in phpMyAdmin) and set your DB credentials in `.env`:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=bachao_airlines
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. Set up the database schema — pick one:

   **Option A — Laravel migrations (recommended for a fresh setup):**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

   **Option B — import the SQL dump directly:**
   ```bash
   mysql -u root bachao_airlines < database/bachao_airlines.sql
   ```
   `database/bachao_airlines.sql` contains the full schema plus the seeded flight data. It does not include user rows — register a new account through the app once it's running, then promote it to `Admin` in the `users` table if you need admin access.

5. Serve the app:
   ```bash
   php artisan serve
   ```
   Visit `http://127.0.0.1:8000`.

## Project Structure

- `app/Http/Controllers` — request handling (dashboard, auth, transactions, feedback, admin panel)
- `app/Models` — `User`, `Flight`, `Transaction`, `Seat`, `Feedback`, `Faq`
- `app/Services/MembershipService.php` — reward-point → membership-tier logic
- `resources/views` — Blade templates for every page
- `database/migrations` — schema definitions
- `database/bachao_airlines.sql` — standalone SQL dump of the schema and seed flight data

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
