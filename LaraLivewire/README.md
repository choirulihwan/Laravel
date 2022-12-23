# description
- Laravel jetstream menggunakan livewire

# spesification
- laravel 9.4.0

# step by step
- composer require laravel/jetstream
- php artisan jetstream:install livewire
- npm install
- npm run dev
- php artisan migrate
- npm i -D vite-plugin-full-reload (hot reload livewire)
    + tambahkan di vite config
        FullReload([ 
            'resources/views/**', 
            'routes/**'
        ])

# catatan
- membuat komponen
    php artisan make:livewire [nama_component]