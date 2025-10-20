<p align="center">
  <img src="public/favicon.ico" width="64" height="64" alt="App Icon" />
</p>

### Education & Career Portal (Laravel 5.8)

This is a Laravel 5.8 application powering an Education & Career portal. It organizes institute information and related content such as departments, courses, jobs, notices, files, and alumni. The project also includes a suggestion module for marketplace-like data structures (buyers, sellers, products, transactions) used for demonstrations and internal tooling.

---

### Tech stack
- **Framework**: Laravel 5.8 (`laravel/framework: 5.8.*`)
- **PHP**: ^7.1.3
- **Auth**: Laravel UI auth scaffolding (`Auth::routes()`)
- **Images**: `intervention/image`
- **Frontend tooling**: Laravel Mix (Webpack), Node/NPM
- **Database**: MySQL (via Eloquent ORM and migrations)

### Key modules (from `app/`)
- **Institutions**: `Varsity`, `SchoolCollege`, `TrainingCenter`, `InstituteType`
- **Academics**: `Department`, `Course`, `Type`, `Language`
- **Content**: `Content`, `Notice`, `File`, `FileType`
- **People**: `Alumni`, `User`
- **Geo**: `Division`, `District`
- **Careers**: `Career`, `Job`
- **Suggestion sandbox** (`sugestion/`): `Buyer`, `Seller`, `Product`, `Transaction`

### Routing
Core routes are defined in `routes/web.php`:
- `/` → `Pages\HomePageController@index`
- Auth routes via `Auth::routes()`
- `/home` → `HomeController@index`

---

### Requirements
- PHP 7.1.3+
- Composer
- MySQL (or compatible)
- Node.js 10+ and NPM (for asset build)

### Getting started (local)
1) Clone the repository
```bash
git clone <your-repo-url>
cd ecp-main
```

2) Install PHP dependencies
```bash
composer install
```

3) Configure environment
- If `.env` doesn’t exist, create it. This repo includes a sample `- Copy.env`; you can duplicate it or use the standard example:
```bash
copy "- Copy.env" .env   # Windows PowerShell/CMD
# or
cp "- Copy.env" .env     # Git Bash
```
- Set database credentials and `APP_URL` in `.env`.

4) Generate app key
```bash
php artisan key:generate
```

5) Run migrations (and seeds if available)
```bash
php artisan migrate
# php artisan db:seed    # optional, if seeders are configured
```

6) Storage symlink (if your features serve files from storage)
```bash
php artisan storage:link
```

7) Install and build frontend assets
```bash
npm install
npm run dev   # or: npm run prod
```

8) Serve the application
```bash
php artisan serve
# Visit: http://127.0.0.1:8000/
```

---

### Project structure highlights
- `app/` — Eloquent models and application classes for modules listed above
- `routes/web.php` — web routes and auth endpoints
- `database/migrations/` — schema migrations for core entities
- `resources/views/` — Blade templates for pages
- `public/` — public assets (favicon, images, compiled CSS/JS)
- `sugestion/` — example marketplace-style domain used for demos/tests

### Notable packages
- `intervention/image` — image manipulation for uploads/thumbnails

---

### Development tips
- Ensure your local PHP version matches `^7.1.3` to avoid dependency conflicts.
- If you are on XAMPP, point the Apache document root to this folder’s `public/` directory.
- Run `composer dump-autoload` after adding new classes under `app/` or `sugestion/`.

### Testing
```bash
php artisan test
# or for older Laravel test runner
./vendor/bin/phpunit
```

---

### Deployment notes
- Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`.
- Run database migrations during deploy: `php artisan migrate --force`.
- Build production assets: `npm ci && npm run prod`.
- Configure the web server to serve from `public/`.

### Security
If you discover a security issue, please open a private issue or contact the maintainer. Do not disclose publicly until a fix is released.

### License
The underlying framework (Laravel) is MIT licensed. Project code licensing is unspecified in this repository; please add a `LICENSE` file if you intend to open-source it.

---

### Maintainer notes
- Laravel: 5.8.x (from `composer.json`)
- PHP: ^7.1.3
- First-run scripts available via Composer will generate an app key if `.env` exists.
