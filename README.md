# 📚 NIMpress - Platform Publikasi Artikel Mahasiswa

Platform publikasi artikel berbasis web yang memungkinkan mahasiswa untuk berbagi pengetahuan, pengalaman, dan karya ilmiah dengan mudah.

![NIMpress](public/assets/images/banner.jpg)

## ✨ Fitur Utama

### Untuk Mahasiswa (Author)
- ✅ Login menggunakan NIM
- ✅ Menulis & mengelola artikel
- ✅ Upload thumbnail artikel
- ✅ Sistem draft & publish
- ✅ Like & komentar artikel
- ✅ Export artikel ke PDF
- ✅ Profil publik dengan statistik
- ✅ Dark mode preference

### Untuk Admin
- ✅ Dashboard statistik lengkap
- ✅ Moderasi artikel
- ✅ Moderasi komentar (approve/reject)
- ✅ Manajemen users
- ✅ Notifikasi pending comments

### Untuk Guest (Pengunjung)
- ✅ Membaca artikel
- ✅ Mencari & filter artikel
- ✅ Lihat profil author
- ✅ Dark mode toggle

## 🛠️ Teknologi yang Digunakan

- **Backend:** Laravel 12, PHP 8.2+
- **Database:** MySQL
- **Frontend:** Tailwind CSS, Alpine.js
- **PDF Export:** DomPDF
- **Server:** Laragon (Development)

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL
- Laragon (untuk local development)

## 🚀 Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/username/nimpress.git
cd nimpress
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` dan sesuaikan konfigurasi database:
```env
DB_DATABASE=nimpress
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Create Database

Buat database bernama `nimpress` di phpMyAdmin atau MySQL.

### 5. Run Migration & Seeder
```bash
php artisan migrate --seed
```

### 6. Storage Link
```bash
php artisan storage:link
```

### 7. Build Assets
```bash
npm run build
```

Atau untuk development:
```bash
npm run dev
```

### 8. Run Server
```bash
php artisan serve
```

Akses: `http://localhost:8000` atau `http://nimpress.test` (jika menggunakan Laragon)

## 👤 Default Users

### Admin
- NIM: `ADMIN001`
- Password: `admin123`

### Mahasiswa
- NIM: `220123456`
- Password: `password`

## 📁 Struktur Folder Utama
```
nimpress/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin controllers
│   │   ├── Auth/           # Authentication
│   │   ├── BlogController  # Public blog
│   │   ├── PostController  # CRUD posts
│   │   └── ProfileController
│   └── Models/             # Eloquent models
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/           # Database seeders
├── resources/
│   ├── css/               # Tailwind CSS
│   ├── js/                # Alpine.js & custom JS
│   └── views/             # Blade templates
│       ├── admin/         # Admin views
│       ├── blog/          # Public blog
│       ├── dashboard/     # User dashboard
│       ├── components/    # Reusable components
│       └── pdf/           # PDF templates
├── routes/
│   └── web.php            # Route definitions
└── public/
    ├── uploads/           # User uploads
    └── storage/           # Symlink to storage
```

## 🎨 Fitur UI/UX

- ✅ Glassmorphism design
- ✅ Dark mode with smooth transition
- ✅ Responsive (mobile, tablet, desktop)
- ✅ Loading states & skeleton screens
- ✅ Toast notifications
- ✅ Smooth animations
- ✅ AJAX like system
- ✅ Scroll to top button

## 📱 Responsive Breakpoints

- Mobile: 320px - 640px
- Tablet: 641px - 1024px
- Desktop: 1025px+

## 🔐 Security Features

- CSRF Protection
- Password hashing (bcrypt)
- SQL Injection prevention (Eloquent ORM)
- XSS Protection
- Role-based access control
- Input validation

## 📊 Database Schema

### Users
- id, nim, name, email, prodi, angkatan, password, role, theme, avatar, bio

### Posts
- id, user_id, category_id, title, slug, excerpt, content, thumbnail, status, views, published_at

### Categories
- id, name, slug, description, color, icon

### Comments
- id, post_id, user_id, content, status

### Likes
- id, post_id, user_id

## 🧪 Testing

### Manual Testing Checklist

- [ ] Register & Login
- [ ] Create, Edit, Delete Post
- [ ] Like & Comment
- [ ] Dark Mode Toggle
- [ ] PDF Export
- [ ] Admin Dashboard
- [ ] Comment Moderation
- [ ] Responsive Design
- [ ] SEO Meta Tags

## 🚀 Deployment (Production)

### 1. Optimize for Production
```bash
composer install --optimize-autoloader --no-dev
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 2. Set Environment
```env
APP_ENV=production
APP_DEBUG=false
```

### 3. Setup Queue (Optional)
```bash
php artisan queue:work
```

### 4. Setup Cron (Optional)
```bash
* * * * * cd /path-to-project && php artisan schedule:run >> /dev/null 2>&1
```

## 🐛 Troubleshooting

### Error: Class not found
```bash
composer dump-autoload
php artisan optimize:clear
```

### Storage symlink error
```bash
php artisan storage:link
```

### Permission denied
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### NPM build error
```bash
rm -rf node_modules package-lock.json
npm install
npm run build
```

## 📝 TODO / Future Features

- [ ] Email notifications
- [ ] Social media login
- [ ] Advanced search with filters
- [ ] Article bookmarks
- [ ] Reading list
- [ ] Author following system
- [ ] Article analytics
- [ ] Multi-language support
- [ ] API for mobile app

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

This project is open-sourced software licensed under the MIT license.

## 👨‍💻 Author

**NIMpress Team**
- Email: rehanxald@gmail.com
- Website: -

## 🙏 Acknowledgments

- Laravel Framework
- Tailwind CSS
- Alpine.js
- DomPDF
- Font Awesome (icons)
- Unsplash (sample images)

## 📞 Support

Jika mengalami kendala atau memiliki pertanyaan:
- Email: support@nimpress.id
- GitHub Issues: [Create an issue](https://github.com/username/nimpress/issues)

---

**Built with ❤️ by NIMpress Team**
