# Laravel Wikipedia Full-Text Search Engine

## Project Overview
A robust full-text search engine for Wikipedia articles built with Laravel, featuring advanced search capabilities, stemming, caching, and relevance scoring.

## Prerequisites
- PHP 8.1+
- Composer
- MySQL 5.7+
- Node.js (for frontend assets)


## Software for devlopment or to run this app.
download laravel Herd from https://herd.laravel.com/

## Installation Steps


### 1. Clone the Repository or Unzip
```bash
git clone https://github.com/gnanikayalamanchili/wikipedia-search.git
cd wikipedia-search
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Configuration
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Setup
Edit `.env` file with your database credentials:
For Mysql
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wikipedia_search
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
For Sqlite
```
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=wikipedia_search
# DB_USERNAME=root
# DB_PASSWORD=
```
Create the database:
```bash
# Create database
mysql -u root -p -e "CREATE DATABASE wikipedia_search;"

# Run migrations
php artisan migrate
```

### 5. Search Configuration
Update `.env` for search settings:
```
SCOUT_DRIVER=tntsearch
```

### 6. Import Wikipedia Data
```bash
# Seed database with initial data
php artisan db:seed --class=WikipediaArticleSeeder

# Build search index
php artisan scout:import "App\Models\WikipediaArticle"
```

### 7. Compile Frontend Assets (optional)
```bash
npm run dev
# or for production
npm run build
```

### 8. Start Development Server
```bash
php artisan serve
```
Make sure `.env` match with `APP_URL`

## Project Features
- Full-text search with advanced indexing
- Stemming and stop word removal
- Caching for search results
- Relevance scoring
- Responsive Bootstrap 5 frontend

## Additional Configuration

### Search Optimization
Customize search parameters in `config/scout.php`:
```php
'tntsearch' => [
    'storage'  => storage_path('indexes'),
    'fuzziness' => 0.5,
    'fuzzy' => [
        'prefix_length' => 2,
        'max_expansions' => 50,
    ],
],
```


## Troubleshooting
- Ensure all dependencies are installed
- Check database connection
- Verify `.env` file configurations
- Regenerate search index if needed

## Contact
Gnanika Yalamanchili - s1367464@monmouth.edu
