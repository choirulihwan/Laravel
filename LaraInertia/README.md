# Description
- Laravel with jetstream/inertia

# features
- multilanguage
- authorization with spatie

# spesification
- Laravel Framework 9.45.1

# Step by step
- laravel new [project_name]
- composer require laravel/jetstream
- php artisan jetstream:install inertia
- setup .env
- php artisan migrate

# step by step multilang
- npm i laravel-vue-i18n

# step by step authorization
- composer require spatie/laravel-permission
- config.app
    'providers' => [
	    Spatie\Permission\PermissionServiceProvider::class,
    ],
- php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
- php artisan migrate
- app/Http/Kernel.php
    protected $routeMiddleware = [    
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
    ]
- web.php
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
- copy database/seeds/PermissionTableSeeder.php
- php artisan db:seed --class=PermissionTableSeeder
- copy database/seeds/CreateAdminUserSeeder.php
- app/Model/User.php
    use Spatie\Permission\Traits\HasRoles;
    use HasRoles;
- php artisan db:seed --class=CreateAdminUserSeeder
- databaseseeder.php
    $this->call([
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,            
        ]);
- php artisan migrate:fresh --seed


[TODO]
