# Laravel
Repository for laravel applications:
# 1 Todos Application
# 2 Blog Application

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
# 9. buat controller php artisan make:controller <nama_model>Controller --resource
# 10. buat view di resource/views/admin/<nama_view>.blade.php
# 11. buat route di routes/web.php

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


