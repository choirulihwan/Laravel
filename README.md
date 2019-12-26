# Laravel
Repository for laravel applications:
#1 Todos Application
#2 Blog Application

# catatan
# menjalankan make:auth di laravel 6
# composer require laravel/ui
# php artisan ui [bootstrap] --auth (bisa diganti dgn bootstrap, vue, react)
# npm install && npm run dev

# SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table `users` add unique `users_email_unique`(`email`))
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

#error:
#Illuminate\Contracts\Container\BindingResolutionException  : Target class [UsersTableSeeder] does not exist. => when running php artisan db:seed
#solution:
#composer  dump-autoload

