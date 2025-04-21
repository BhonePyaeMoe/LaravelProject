# NovaBright - Educational Consulting Appointment System

<p>NovaBright is a web-based appointment booking platform built with **Laravel** (PHP) on the backend. It enables students to schedule consultations with educational advisors from NovaBright. </p>

## 🚀 Features

- Student registration & login
- Consultant profiles and availability
- Real-time appointment booking
- Admin panel for managing appointments
- SQLite database for lightweight development
- RESTful API for front-end integration


## 🛠️ Tech Stack

- **Backend:** Laravel 10
- **Frontend:** Blade
- **Database:** SQLite
- **Authentication:** Laravel Sanctum 
- **API:** RESTful endpoints for client-side consumption


## 📦 Installation

### 1. Clone the repository

- git clone https://github.com/BhonePyaeMoe/LaravelProject.git
- cd novabright-appointments

### 2. Install dependencies
- composer install

### 3. Create .env file
- cp .env.example .env

- Set the following for SQLite in .env:
DB_CONNECTION=sqlite
DB_DATABASE=/localhost


### 4. Generate app key
- php artisan key:generate

### 5. Run migrations
- php artisan migrate
- php artisan db:seed

### 6. Start server
php artisan serve


## 🧪 Running Tests
- php artisan test

## 📝 Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

## 🧠 Future Improvements

- Notification system (email/SMS)
- Video consultation support

## 🧑‍💼 About NovaBright
NovaBright is an educational consulting company helping students navigate their academic futures with expert advice and support.
