<h1 align="center">
  <br>
  📄 ResumeForge
  <br>
</h1>

<h4 align="center">A full-stack PHP web application for creating, customizing, and sharing professional CVs — fast.</h4>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" />
  <img src="https://img.shields.io/badge/jQuery-3.7-0769AD?style=for-the-badge&logo=jquery&logoColor=white" />
  <img src="https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge&logo=apache&logoColor=white" />
</p>

<p align="center">
  <a href="#-description">Description</a> •
  <a href="#-features">Features</a> •
  <a href="#-technologies-used">Tech Stack</a> •
  <a href="#-installation">Installation</a> •
  <a href="#-usage">Usage</a> •
  <a href="#-folder-structure">Folder Structure</a> •
  <a href="#-contributing">Contributing</a> •
  <a href="#-license">License</a>
</p>

---

## 📖 Description

**ResumeForge** is a beginner-friendly, full-stack web application built with **PHP** and **MySQL** that lets users build, manage, and share professional resumes online. Users can register an account, create multiple CVs, manage their work experience, education, and skills, and export their resume as a **printable PDF** — all from a single polished dashboard.

The project was built as a personal learning project to demonstrate skills in PHP, MySQL, session management, AJAX, and UI design using Bootstrap 5.

---

## ✨ Features

- 🔐 **User Authentication** — Register, login, and logout with secure session handling
- 📧 **Forgot Password with Email OTP** — Reset password via a 6-digit verification code sent to your email (PHPMailer + Gmail SMTP)
- 📝 **Create & Edit Resumes** — Full-featured form to enter personal info, objective, contact details, and more
- 💼 **Experience Management** — Add and delete work experience entries per resume
- 🎓 **Education Management** — Add and delete education records per resume
- 🛠️ **Skills Management** — Add and delete individual skills per resume
- 🖨️ **Print & PDF Export** — Print-ready layout with one-click PDF download via html2canvas + jsPDF
- 🎨 **Background Themes** — Choose from 23 tile patterns for your resume background
- 🔤 **Font Customization** — Select from 9 Google Fonts (Poppins, Nunito, Dancing Script, and more)
- 📋 **Clone Resume** — Duplicate any resume with all its data as a starting point
- 🗑️ **Delete Resume** — Removes resume along with all linked experiences, educations, and skills
- 👤 **Profile Management** — Update name, email, and password from the account settings page
- 📱 **Responsive Design** — Glassmorphism SaaS UI, works on desktop and mobile
- 🔗 **Share via WhatsApp** — Share a direct link to your resume

---

## 🛠️ Technologies Used

| Layer | Technology |
|-------|-----------|
| Backend | PHP 8.x (procedural + OOP) |
| Database | MySQL (via MySQLi) |
| Frontend | HTML5, Bootstrap 5.3, Vanilla CSS |
| JavaScript | jQuery 3.7, AJAX |
| Email | PHPMailer (Gmail SMTP) |
| PDF Export | html2canvas + jsPDF |
| Icons | Bootstrap Icons 1.11 |
| Fonts | Google Fonts |
| Server | Apache (XAMPP / WAMP / LAMP) |

---

## ⚙️ Installation

Follow these steps to run **ResumeForge** on your local machine.

### Prerequisites

Make sure you have the following installed:

- [XAMPP](https://www.apachefriends.org/) (or any Apache + PHP + MySQL stack)
- [Git](https://git-scm.com/)
- A Gmail account (for the forgot password email feature)

---

### Step 1 — Clone the Repository

Open your terminal and navigate to your XAMPP `htdocs` folder:

```bash
cd C:/xampp/htdocs
```

Then clone the project:

```bash
git clone https://github.com/your-username/ResumeForge.git
```

> This will create a folder called ResumeForge inside htdocs.

---

### Step 2 — Set Up the Database

1. Start **Apache** and **MySQL** from the XAMPP Control Panel.
2. Open your browser and go to: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
3. Click **"New"** and create a database named:

```
resumebuilder
```

4. Select the `resumebuilder` database, click the **"SQL"** tab, and run the following SQL to create all required tables:

```sql
-- Users table
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_id` (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Resumes table
CREATE TABLE `resumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_title` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `objective` text DEFAULT NULL,
  `mobile_no` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `background` varchar(100) DEFAULT NULL,
  `font` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Experiences table
CREATE TABLE `experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `started` varchar(100) DEFAULT NULL,
  `ended` varchar(100) DEFAULT NULL,
  `job_desc` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Educations table
CREATE TABLE `educations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `started` varchar(100) DEFAULT NULL,
  `ended` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Skills table
CREATE TABLE `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_id` int(11) DEFAULT NULL,
  `skill` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

---

### Step 3 — Configure the Database Connection

Open the file:

```
ResumeForge/asstes/classes/database.class.php
```

Update the credentials to match your local setup (XAMPP defaults are shown below):

```php
private $host     = "localhost";
private $username = "root";
private $database = "resumebuilder";
private $password = "";        // Leave empty for XAMPP default
```

---

### Step 4 — Configure Email (for Forgot Password)

Open the file:

```
ResumeForge/actions/sentcode.action.php
```

Replace the placeholder SMTP credentials with your own Gmail details:

```php
$mail->Username = 'your-email@gmail.com';   // Your Gmail address
$mail->Password = 'your-app-password';       // Your Gmail App Password (not login password)
```

> **How to generate a Gmail App Password:**
> 1. Go to your Google Account → Security
> 2. Enable **2-Step Verification**
> 3. Go to **App Passwords** → Generate a password for "Mail"
> 4. Paste that 16-character password above

> ⚠️ Never commit real credentials to GitHub. Use a `.env` file or config file that is listed in `.gitignore` for production use.

---

### Step 5 — Run the Project

1. Make sure **Apache** and **MySQL** are running in XAMPP.
2. Open your browser and go to:

```
http://localhost/ResumeForge/
```

3. You should see the **Login** page. Register a new account and start building your resume! 🎉

---

## 🚀 Usage

| Action | How |
|--------|-----|
| Register | Go to `/register.php` and create an account |
| Login | Go to `/index.php` (default landing page) |
| Create Resume | Click **"New Resume"** from the dashboard |
| Edit Resume | Click **"Edit"** on any resume card |
| Add Experience / Education / Skills | Use the modal pop-ups on the Edit Resume page |
| View Resume | Click **"View"** — opens a printable resume page |
| Download PDF | Click **"Download"** button on the resume view page |
| Change Theme | Click **"Background"** or **"Font"** on the resume view page |
| Clone Resume | Click **"Clone"** on any resume card in the dashboard |
| Delete Resume | Click **"Delete"** on any resume card |
| Reset Password | Click **"Forgot password?"** on the login page |

---

## 📁 Folder Structure

```
ResumeForge/
│
├── index.php                  # Login page
├── register.php               # Registration page
├── myresumes.php              # Dashboard — list of all resumes
├── createresume.php           # Create new resume form
├── updateresume.php           # Edit resume + manage skills/edu/exp
├── resume.php                 # Public resume view + PDF/print
├── profile.php                # User account settings
├── forgot-password.php        # Forgot password — send OTP
├── verfication.php            # OTP verification page
├── change-password.php        # Set new password page
│
├── actions/                   # Form handler scripts (PHP logic)
│   ├── login.action.php
│   ├── register.action.php
│   ├── logout.action.php
│   ├── createresume.action.php
│   ├── updateresume.action.php
│   ├── deleteresume.action.php
│   ├── clonecv.action.php
│   ├── addeducation.action.php
│   ├── addexperience.action.php
│   ├── addskill.action.php
│   ├── deleteedu.action.php
│   ├── deleteexp.action.php
│   ├── deleteskill.action.php
│   ├── updateprofile.action.php
│   ├── changepassword.action.php
│   ├── changeback.action.php
│   ├── changefont.action.php
│   ├── sentcode.action.php
│   └── verification.action.php
│
├── asstes/                    # Static assets
│   ├── classes/
│   │   ├── database.class.php # MySQLi database wrapper
│   │   ├── function.class.php # Auth, session, redirect helpers
│   │   └── packages/
│   │       └── php mailer/    # PHPMailer library
│   ├── css/
│   │   └── app.css            # Custom styles (glassmorphism UI)
│   ├── js/
│   │   └── jquery-3.7.1.min.js
│   ├── images/
│   │   ├── logo.png
│   │   └── tiles/             # Background tile images (tile1.png … tile23.jpg)
│   └── includes/
│       ├── header.php         # Auth page HTML head + session start
│       ├── header2.php        # App page HTML head
│       ├── navbar.php         # Top navigation bar
│       ├── footer.php         # Scripts + SweetAlert init (app pages)
│       ├── footer-auth.php    # Scripts + SweetAlert init (auth pages)
│       └── auth-brand.php     # Left panel branding for auth pages
│
└── css/
    └── style.css
```

---

## 🤝 Contributing

Contributions are welcome! Here's how to get started:

1. **Fork** this repository
2. **Clone** your fork:
   ```bash
   git clone https://github.com/your-username/ResumeForge.git
   ```
3. **Create a new branch** for your feature:
   ```bash
   git checkout -b feature/your-feature-name
   ```
4. **Make your changes** and commit them:
   ```bash
   git commit -m "feat: add your feature description"
   ```
5. **Push** to your fork:
   ```bash
   git push origin feature/your-feature-name
   ```
6. Open a **Pull Request** against the `main` branch

### Ideas for Contributions

- [ ] Add profile photo upload support
- [ ] Add multiple resume templates
- [ ] Add a public shareable link feature
- [ ] Convert raw SQL to prepared statements (security improvement)
- [ ] Add Dark/Light mode toggle
- [ ] Add resume download as `.docx`

---

## 🔒 Security Notes

> This project was built as a **learning/portfolio project**. Before deploying to production:
> - Replace raw MySQLi queries with **prepared statements** to prevent SQL injection
> - Move SMTP credentials to environment variables (`.env`) and add `.env` to `.gitignore`
> - Use `password_hash()` / `password_verify()` instead of `md5()` for password storage
> - Add CSRF token protection to all forms

---

## 📄 License

This project is licensed under the **MIT License** — you are free to use, modify, and distribute it with attribution.

```
MIT License

Copyright (c) 2026 ResumeForge

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
```

---

<p align="center">Made with ❤️ using PHP & Bootstrap · <b>ResumeForge</b></p>
