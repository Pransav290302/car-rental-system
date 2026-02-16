# Car Rental System

A web-based car rental management application built with PHP and MySQL.

The project includes:
- A customer-facing portal to browse vehicles and place bookings
- An admin panel to manage cars, brands, bookings, users, pages, and inquiries

## Features

### Customer Module
- User registration and login
- Browse available cars
- View detailed vehicle information and accessories
- Book a vehicle by selecting from/to dates
- View booking history and booking status
- Submit testimonials
- Contact form and static CMS pages (About, Terms, Privacy, FAQs)

### Admin Module
- Admin login panel
- Dashboard with key counters
- Manage brands
- Add/edit/manage vehicles
- Manage bookings (approve/cancel)
- Manage registered users
- Manage testimonials
- Manage contact queries and subscribers
- Manage dynamic pages and contact info

## Tech Stack

- Backend: PHP (PDO-based MySQL queries)
- Database: MySQL
- Frontend: HTML, CSS, Bootstrap, JavaScript, jQuery
- Assets/UI: Bootstrap, Font Awesome, Slick/Owl Carousel
- Optional payment script: Razorpay (`payscript.php`)

## Project Structure

```text
car-rental-system-main/
├── admin/                  # Admin panel
│   ├── includes/           # Admin config and shared files
│   ├── img/                # Vehicle and UI images
│   └── *.php               # Admin pages (dashboard, manage-*.php, etc.)
├── assets/                 # Frontend CSS/JS/images
├── includes/               # Frontend shared files (header, footer, auth modals)
├── sqlfile/
│   └── carrental.sql       # Database schema + sample data
├── index.php               # Home page
├── car-listing.php         # Vehicle listing
├── vehical-details.php     # Vehicle details + booking
└── README.md
```

## Prerequisites

- XAMPP / WAMP / LAMP (Apache + PHP + MySQL)
- PHP 7.x or later
- MySQL 5.6+ (or MariaDB equivalent)
- phpMyAdmin (recommended for easy SQL import)

## Installation and Setup

1. **Extract / place project**
   - Place the folder in your web root:
     - XAMPP: `C:\xampp\htdocs\car-rental-system-main`
     - WAMP: `C:\wamp64\www\car-rental-system-main`

2. **Create database**
   - Create a database named:
     - `carrental`

3. **Import SQL**
   - Import `sqlfile/carrental.sql` into `carrental` using phpMyAdmin
   - This creates all required tables and sample data

4. **Configure database credentials**
   - Update credentials in both files if your MySQL settings differ:
     - `includes/config.php`
     - `admin/includes/config.php`

5. **Start services**
   - Start Apache and MySQL in XAMPP/WAMP

6. **Run application**
   - Frontend: `http://localhost/car-rental-system-main/`
   - Admin: `http://localhost/car-rental-system-main/admin/`

## Default Admin Access

- Username (seeded in SQL): `admin`
- Password: stored as MD5 hash in the `admin` table from the SQL dump

If login does not work, reset password manually in MySQL:

```sql
UPDATE admin
SET Password = MD5('admin123')
WHERE UserName = 'admin';
```

Then log in with:
- Username: `admin`
- Password: `admin123`

## Main Database Tables

- `admin`
- `tblusers`
- `tblvehicles`
- `tblbrands`
- `tblbooking`
- `tbltestimonial`
- `tblcontactusquery`
- `tblcontactusinfo`
- `tblpages`
- `tblsubscribers`

## Troubleshooting

- **Database connection error**
  - Verify DB host/user/password/database in both config files.
- **Blank pages / no visible errors**
  - Some files suppress errors with `error_reporting(0)`.
  - Temporarily enable PHP error display for debugging.
- **Images not loading**
  - Check `admin/img/vehicleimages/` paths and file permissions.
- **Admin cannot log in**
  - Reset password using the SQL query above.

## Security Notes

This project appears to be intended for learning/demo use. Before production use:
- Replace MD5 password hashing with `password_hash()` / `password_verify()`
- Add CSRF protection for forms
- Validate and sanitize all input consistently
- Rotate any test API keys (for example in `payscript.php`)

## License

No explicit license file is included in this repository. Add a `LICENSE` file if you plan to publish or distribute this project publicly.
