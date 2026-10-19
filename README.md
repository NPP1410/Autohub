# Pipatdev Template

## Setup Project

หลังจาก Clone Project มาแล้ว ให้ทำตามขั้นตอนดังนี้

### 1. Install Dependencies

```bash
composer install
```

### 2. Create Environment File

Copy `.env.example` เป็น `.env`

```bash
cp .env.example .env
```

### 3. Generate Application Key

```bash
php artisan key:generate
```

### 4. Configure Database

แก้ไขข้อมูล Database ในไฟล์ `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migration

```bash
php artisan migrate
```

### 6. Seed Permission

```bash
php artisan db:seed --class="PermissionSampleSeeder"
```