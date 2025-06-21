# 🗳️ Laravel Voting System

A web-based voting platform built using Laravel, allowing users to register, view elections, and cast votes securely. Admins can create and manage elections and candidates.

---

## 🚀 Features

- User Authentication (Login/Signup)
- Role-based access: User & Admin
- Create and manage Elections (Admin)
- Add/Edit/Delete Candidates (Admin)
- Secure voting system (1 vote per user per election)
- Vote progress and result visualization
- Contact form with email sending functionality
- Responsive UI using HTML, CSS, and JavaScript

---

## 🛠️ Tech Stack

- **Backend:** Laravel 10+
- **Frontend:** Blade Templates, HTML5, CSS3, JavaScript
- **Database:** MySQL
- **Mailing:** Laravel Mail (SMTP)
- **Other:** Carbon, Eloquent Relationships, CSRF protection

---

## 📦 Installation

1. **Clone the repo**
   ```bash
   git clone https://github.com/gulfarazkhanniazi/Laravel-Voting-System.git
   cd laravel-voting-system

2. **Install PHP Dependencies**
   ```bash
   composer install

3. **Create .env File**
   ```bash
   cp .env.example .env

4. **Generate Application Key**
   ```bash
   php artisan key:generate

5. **Configure Database**
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=voting_system
   DB_USERNAME=root
   DB_PASSWORD=

6. **Run Migrations**
   ```bash
   Run Migrations

7. **Configure Mail in .env**
   ```bash
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USERNAME=your_email@gmail.com
   MAIL_PASSWORD=your_generated_app_password
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=your_email@gmail.com
   MAIL_FROM_NAME="Laravel Voting System"

8. **php artisan serve**
   ```bash
   php artisan serve


-- Happy pushing to GitHub! 🚀