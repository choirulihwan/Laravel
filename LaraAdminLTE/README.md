# description
- Laravel project with simple authentication and authorization using user, group, menu, module, group_menu and group module using spatie and template AdminLTE

# technology
- laravel 8
- laravel ui
- jeroennoten/laravel-adminlte
- laravelcollective/html
- spatie
- bootstrap css
- bootstrap icon
- blade templating


# step by step
- composer create-project laravel/laravel [project_name]
- composer require jeroennoten/laravel-adminlte
- php artisan adminlte:install
- php artisan adminlte:plugins install --plugin=icheckBootstrap
- composer require spatie/laravel-permission
- composer require laravelcollective/html
- php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
- php artisan migrate
- composer require laravel/ui
- php artisan ui bootstrap --auth
- npm install
- npm run dev
- npm run watch


# usage
- https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Usage
- https://www.itsolutionstuff.com/post/laravel-8-user-roles-and-permissions-tutorialexample.html
- https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Authentication-Views