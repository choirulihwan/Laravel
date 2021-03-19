# Laravel
Repository for laravel applications:
# 1 Todos Application (laravel 6.7)
# 2 Blog Application (laravel 6.7)
# 3 Forum Application (laravel 5.4)
# 4 Ecommerce Application (laravel 5.4)
# 5 Company Profile (laravel 8.5)

# catatan
# step by step membuat project di laravel
# 1 composer create-project laravel/laravel <nama_project>
# 2 merubah tampilan theme index
# 3 buat base template frontend.blade
# 4 buat content template
# 5 buat backend
# 5.1 buat mekanisme login backend
# 5.1.1 composer require laravel/ui
# 5.1.2 php artisan ui [bootstrap] --auth (bisa diganti dgn bootstrap, vue, react)
# 5.1.3 npm install && npm run dev
# 5.1.4 buat dan setting database di .env
# 5.1.5 php artisan migrate (migrasi tabel user)
# 5.1.6 register via UI atau edit seeeder


# catatan
# membuat model di laravel 6
# 1. php artisan make:model <nama_model> -m
# 2. tambahkan field2 yg diinginkan di file database/migrations/create_<nama_model>_table.php di function up
# 3. edit file app/<nama_model>.php tambahkan protected $fillable = ['<nama_field>']
# 4. buat seeder utk default value table yg barusan dibuat php artisan make:seeder <nama_model>TableSeeder
# 5. isikan default value di database/seeds/<nama_model>TableSeeder.php
# 6. panggil seeder di database/seeds/DatabaseSeeder.php di function run
# 7. jalankan php artisan migrate
# 8. jalankan php artisan db:seed

# catatan
# membuat controller di laravel 6
# 1. buat controller php artisan make:controller <nama_model>Controller --resource
# 2. buat view di resource/views/admin/<nama_view>.blade.php
# 3. buat route di routes/web.php

# catatan
# step by step after clone or pull
# 1. composer install
# 2. php artisan key:generate
# 3. php artisan migrate
# 4. php artisan db:seed
# 5. php artisan serve


# alter table
# php artisan make:migration <nama_migrasi> --table="<nama_table>"
# php artisan migrate

# catatan
# menjalankan make:auth di laravel 6 
# composer require laravel/ui
# php artisan ui [bootstrap] --auth (bisa diganti dgn bootstrap, vue, react)
# npm install && npm run dev


# error:
# SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table `users` add unique `users_email_unique`(`email`))
# solusi:
# edit app/providers/AppServiceProvider.php
# public function boot()
#    {
#        //
#        Schema::defaultStringLength(191);
#    }

# error: 
# Call to undefined function App\Http\Controllers\str_slug()
# solusi: 
# composer require laravel/helpers
# Illuminate\Support\Str (dicontroller)

# error:
# Illuminate\Contracts\Container\BindingResolutionException  : Target class [UsersTableSeeder] does not exist. => when running php artisan db:seed
# solution:
# composer  dump-autoload

# error:
# install curl lib in php 7.2 ubuntu (curl required by spatie/newsletter)
# solution
# sudo add-apt-repository ppa:ondrej/php
# sudo apt update
# sudo apt install php7.2-fpm php7.2-gd php7.2-curl php7.2-mysql php7.2-dev php7.2-cli php7.2-common php7.2-mbstring php7.2-intl php7.2-zip php7.2-bcmath

# error:
# PHP Warning:  require(D:\MINE\Laravel\MyForum\bootstrap/../vendor/autoload.php): failed to open stream
# solution:
# cd <project_directory>
# composer install

# error
# Expected response code 250 but got code “530”, with message "530 5.7.1 Authentication required
# solution:
# your mail.php on config you declare host as smtp.mailgun.org and port is 587 while on env is different. 
# you need to change your mail.php to
# 'host' => env('MAIL_HOST', 'mailtrap.io'),
# 'port' => env('MAIL_PORT', 2525),
# if you desire to use mailtrap.Then run
# php artisan config:cache

# error:
# In PackageManifest.php line 122: Undefined index: name


# run test
# /vendor/bin/phpunit <nama_direktori>

