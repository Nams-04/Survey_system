# 📊 Anonymous Survey System (Laravel)

## 📌 Project Overview

This project is a web-based **Anonymous Survey System** built using Laravel. It allows administrators to upload surveys using CSV files and generate dynamic questionnaires with unique URLs. Users can access and submit responses anonymously without logging in.

---

## 🎯 Objective

* Generate surveys from CSV files
* Provide unique URLs for each survey
* Collect anonymous user responses
* Allow admins to manage and analyze results

---

## 👥 Actors

### 👨‍💼 Admin

* Login to secured dashboard
* Upload CSV to create surveys
* Enable/Disable surveys
* View and download results

### 👤 User

* Access surveys via URL
* Answer questions
* Submit responses (no login required)

---

## 🧾 CSV Format

Each row in the CSV file:

```id="t9k23g"
Question, CorrectAnswer, WrongOption1, WrongOption2, ...
```

---

## 🛠️ Technologies Used

* Laravel (PHP Framework)
* MySQL (XAMPP)
* Blade Templates
* Laravel Breeze (Authentication)

---

## ⚙️ Implementation Summary

* CSV files are read using `fgetcsv()`
* Questions and options are parsed and stored in database
* Surveys are assigned unique URLs
* Questions are dynamically displayed using Blade
* User responses are stored in JSON format
* Admin authentication is handled using Laravel Breeze

---

## 🗄️ Database Tables

* **surveys** → stores survey details
* **questions** → stores questions and options
* **responses** → stores user answers

---

## ⚙️ Installation

```bash id="4r5zci"
git clone https://github.com/YOUR-USERNAME/YOUR-REPO.git
cd survey-system
composer install
npm install
npm run dev
cp .env.example .env
php artisan key:generate
```

Update `.env` with database details, then:

```bash id="9abjzq"
php artisan migrate
php artisan serve
```

---

## 🔄 Workflow

1. Admin uploads CSV
2. System stores questions in database
3. Unique survey link is generated
4. Users access and submit responses
5. Admin views/downloads results

---

## 🔮 Future Improvements

* Add scoring system
* Improve UI design
* Add analytics dashboard

---

## 👩‍💻 Author

**Namratha Reddy**

---

## ✅ Conclusion

This project demonstrates full-stack development using Laravel, including file handling, database management, authentication, and dynamic content generation.

---
