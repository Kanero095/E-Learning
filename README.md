<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<p align="center" style="font-weight:bold; font-size:17px;">
    Link Projek : <a href="https://e-learning-3g3k.onrender.com/">https://e-learning-3g3k.onrender.com/</a>
</p>

# About Projek

## 📌 English Version

### Overview

This Laravel-based E-Learning Platform is designed to provide an interactive, efficient, and scalable online learning environment. The application helps simplify the digital learning process by integrating essential educational features into a centralized, secure, and user-friendly system.

Built with the Laravel framework and powered by a MySQL database, the project follows a clean MVC architecture to ensure maintainability, scalability, and long-term sustainability. The system is equipped with secure authentication, role-based access control, and a responsive interface to provide an optimal experience for both students and instructors.

---

### Features

-   User authentication (Login & Registration)
-   Role-based access control (Admin, Instructor, Student)
-   Course & class management
-   Learning material upload and access (PDF, teks)
-   Assignment creation and submission
-   Secure data validation and session management
<!-- -   Responsive and intuitive user interface -->

---

### Tech Stack

-   Backend: Laravel 11 (PHP)
-   Frontend: Blade + Tailwind CSS
-   Database: MySQL
-   Authentication: Laravel Built-in Auth
-   Version Control: Git & GitHub

---

### Installation & Setup

1. Clone the repository

    ```
    git clone https://github.com/your-username/your-repo-name.git
    ```

2. Open the project folder

    ```
    cd your-repo-name
    ```

3. Install dependencies

    ```
    composer install
    npm install
    ```

4. Copy `.env` file

    ```
    cp .env.example .env
    ```

5. Generate application key

    ```
    php artisan key:generate
    ```

6. Configure your database inside `.env`

    ```
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

7. Run migration & seeders

    ```
    php artisan migrate --seed
    ```

8. Run the project

    ```
    npm run dev
    php artisan serve
    ```

---

### User Roles

-   **Admin**
    Manages users, courses, system settings, and monitors activities.

-   **Instructor**
    Manages courses, uploads materials, creates assignments and quizzes.

-   **Student**
    Accesses materials, submits assignments, takes quizzes, and views progress.

---

### Project Structure (Simplified)

```
/app        -> Application logic (Controllers, Models)
/resources  -> Views (Blade), CSS, JS
/routes     -> Web & API routes
/database   -> Migrations, Seeders
/public     -> Public assets
```

---

### Purpose

This project aims to bridge the gap between traditional learning methods and digital transformation by providing a reliable, flexible, and scalable e-learning solution suitable for schools, training institutions, and independent educators.

---

## 📌 Versi Indonesia

### Gambaran Umum

Platform E-Learning berbasis Laravel ini dirancang untuk menyediakan lingkungan pembelajaran online yang interaktif, efisien, dan dapat dikembangkan. Aplikasi ini membantu menyederhanakan proses pembelajaran digital dengan mengintegrasikan fitur-fitur pendidikan penting dalam satu sistem yang terpusat, aman, dan mudah digunakan.

Dikembangkan menggunakan framework Laravel dan didukung oleh database MySQL, proyek ini menerapkan arsitektur MVC yang bersih untuk memastikan kemudahan pemeliharaan, skalabilitas, dan keberlanjutan jangka panjang. Sistem ini juga dilengkapi dengan autentikasi yang aman, kontrol akses berbasis peran, dan tampilan responsif untuk pengalaman pengguna yang optimal.

---

### Fitur

-   Autentikasi pengguna (Login & Registrasi)
-   Kontrol akses berbasis peran (Admin, Pengajar, Siswa)
-   Manajemen kursus dan kelas
-   Upload & akses materi pembelajaran (PDF, teks)
-   Pembuatan dan pengumpulan tugas
-   Validasi dan keamanan data
<!-- -   Antarmuka responsif & mudah digunakan -->

---

### Teknologi yang Digunakan

-   Backend: Laravel 11 (PHP)
-   Frontend: Blade + Tailwind CSS
-   Database: MySQL
-   Autentikasi: Laravel Built-in Auth
-   Version Control: Git & GitHub

---

### Cara Instalasi

1. Clone repository

    ```
    git clone https://github.com/username/nama-repo-anda.git
    ```

2. Masuk ke folder proyek

    ```
    cd nama-repo-anda
    ```

3. Install dependencies

    ```
    composer install
    npm install
    ```

4. Duplikasi file `.env`

    ```
    cp .env.example .env
    ```

5. Generate application key

    ```
    php artisan key:generate
    ```

6. Atur database di `.env`

    ```
    DB_DATABASE=nama_database
    DB_USERNAME=username
    DB_PASSWORD=password
    ```

7. Jalankan migration & seeder

    ```
    php artisan migrate --seed
    ```

8. Jalankan aplikasi

    ```
    npm run dev
    php artisan serve
    ```

---

### Peran Pengguna

-   **Admin**
    Mengelola pengguna, kursus, pengaturan sistem, dan memantau aktivitas.

-   **Pengajar**
    Mengelola kursus, mengunggah materi, membuat tugas dan kuis.

-   **Siswa**
    Mengakses materi, mengumpulkan tugas, mengerjakan kuis, dan melihat progres.

---

### Tujuan Proyek

Proyek ini bertujuan untuk menjembatani pembelajaran tradisional dengan transformasi digital melalui solusi e-learning yang andal, fleksibel, dan mudah dikembangkan, baik untuk sekolah, lembaga pelatihan, maupun pengajar mandiri.
