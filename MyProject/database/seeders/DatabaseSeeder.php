<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        User::create (
            [
                "name"  => "choirul ihwan",
                "username"  => "choirul",
                "email" => "aristhu_oracle@yahoo.com",
                "password"  => bcrypt('password')
            ]
        );

        // User::create (
        //     [
        //         "name"  => "daffa",
        //         "email" => "daffa@gmail.com",
        //         "password"  => bcrypt('password')
        //     ]
        // );

        \App\Models\User::factory(2)->create();

        Category::create(
            [
                "name" => "Programming", 
                "slug"	=> "programming"
            ]
        );

        Category::create(
            [
                "name" => "Web Design", 
                "slug"	=> "web-design"
            ]
        );


        Category::create(
            [
                "name" => "Personal", 
                "slug"	=> "personal"
            ]
        );

        Post::factory(20)->create();

        // Post::create(
        //     [
        //         "title" => "Judul Pertama", 
        //         "category_id"	=> 1, 
        //         "user_id"   => 1,
        //         "slug"  => "judul-pertama", 
        //         "excerpt"   => "judul pertama ku", 
        //         "content"   => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quaerat aspernatur sunt accusamus odio, magnam doloremque, libero, blanditiis tenetur totam veniam officiis reprehenderit distinctio ex accusantium ipsam fugiat! Vero hic nihil ipsam perferendis, sapiente odio eius voluptatem repellendus, molestiae corporis mollitia quo facilis sequi tenetur sit iusto dolor libero vel! Quasi perferendis placeat quas adipisci maxime, soluta qui mollitia nihil tempore, nulla nisi, molestias iure. Doloremque illum, asperiores cum eligendi ipsam cupiditate ratione nesciunt odio dolore? Necessitatibus nesciunt eius harum cumque corporis autem sequi voluptatum id dolor reiciendis</p>. <p>Autem, voluptatibus! Accusantium deleniti deserunt maxime doloribus sunt repellat fuga doloremque adipisci voluptates iusto commodi, sit perspiciatis quis, veniam consequuntur necessitatibus dolorum exercitationem corporis magni nostrum velit aspernatur impedit dolore id! Sequi error soluta aliquid doloribus ipsam maiores asperiores dolor impedit sit nam culpa, aspernatur id eius, placeat similique nostrum, libero quae delectus quis quibusdam! Deleniti nemo ipsum reiciendis veritatis! Quam porro, eaque fuga tempora eligendi minima officia. Dicta, laudantium quia officiis perspiciatis asperiores architecto molestias libero? Esse, nesciunt omnis. Expedita nesciunt, natus recusandae ratione facilis sequi asperiores veritatis ex perspiciatis, sed doloremque illum vitae numquam eveniet. Quasi doloremque, similique sit quae quis corporis asperiores eos vel ut. Commodi harum debitis recusandae.</p>"
        //     ]
        // );
        
        // Post::create(
        //     [
        //         "title" => "Judul Kedua", 
        //         "category_id"	=> 1, 
        //         "user_id"   => 1,
        //         "slug"  => "judul-kedua", 
        //         "excerpt"   => "judul pertama ku", 
        //         "content"   => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quaerat aspernatur sunt accusamus odio, magnam doloremque, libero, blanditiis tenetur totam veniam officiis reprehenderit distinctio ex accusantium ipsam fugiat! Vero hic nihil ipsam perferendis, sapiente odio eius voluptatem repellendus, molestiae corporis mollitia quo facilis sequi tenetur sit iusto dolor libero vel! Quasi perferendis placeat quas adipisci maxime, soluta qui mollitia nihil tempore, nulla nisi, molestias iure. Doloremque illum, asperiores cum eligendi ipsam cupiditate ratione nesciunt odio dolore? Necessitatibus nesciunt eius harum cumque corporis autem sequi voluptatum id dolor reiciendis</p>. <p>Autem, voluptatibus! Accusantium deleniti deserunt maxime doloribus sunt repellat fuga doloremque adipisci voluptates iusto commodi, sit perspiciatis quis, veniam consequuntur necessitatibus dolorum exercitationem corporis magni nostrum velit aspernatur impedit dolore id! Sequi error soluta aliquid doloribus ipsam maiores asperiores dolor impedit sit nam culpa, aspernatur id eius, placeat similique nostrum, libero quae delectus quis quibusdam! Deleniti nemo ipsum reiciendis veritatis! Quam porro, eaque fuga tempora eligendi minima officia. Dicta, laudantium quia officiis perspiciatis asperiores architecto molestias libero? Esse, nesciunt omnis. Expedita nesciunt, natus recusandae ratione facilis sequi asperiores veritatis ex perspiciatis, sed doloremque illum vitae numquam eveniet. Quasi doloremque, similique sit quae quis corporis asperiores eos vel ut. Commodi harum debitis recusandae.</p>"
        //     ]
        // );
        
        // Post::create([
        //     "title" => "Judul Ketiga", 
        //     "category_id"	=> 1, 
        //     "user_id"   => 2,
        //     "slug"  => "judul-ketiga", 
        //     "excerpt"   => "judul pertama ku", 
        //     "content"   => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore quaerat aspernatur sunt accusamus odio, magnam doloremque, libero, blanditiis tenetur totam veniam officiis reprehenderit distinctio ex accusantium ipsam fugiat! Vero hic nihil ipsam perferendis, sapiente odio eius voluptatem repellendus, molestiae corporis mollitia quo facilis sequi tenetur sit iusto dolor libero vel! Quasi perferendis placeat quas adipisci maxime, soluta qui mollitia nihil tempore, nulla nisi, molestias iure. Doloremque illum, asperiores cum eligendi ipsam cupiditate ratione nesciunt odio dolore? Necessitatibus nesciunt eius harum cumque corporis autem sequi voluptatum id dolor reiciendis</p>. <p>Autem, voluptatibus! Accusantium deleniti deserunt maxime doloribus sunt repellat fuga doloremque adipisci voluptates iusto commodi, sit perspiciatis quis, veniam consequuntur necessitatibus dolorum exercitationem corporis magni nostrum velit aspernatur impedit dolore id! Sequi error soluta aliquid doloribus ipsam maiores asperiores dolor impedit sit nam culpa, aspernatur id eius, placeat similique nostrum, libero quae delectus quis quibusdam! Deleniti nemo ipsum reiciendis veritatis! Quam porro, eaque fuga tempora eligendi minima officia. Dicta, laudantium quia officiis perspiciatis asperiores architecto molestias libero? Esse, nesciunt omnis. Expedita nesciunt, natus recusandae ratione facilis sequi asperiores veritatis ex perspiciatis, sed doloremque illum vitae numquam eveniet. Quasi doloremque, similique sit quae quis corporis asperiores eos vel ut. Commodi harum debitis recusandae.</p>"
        //     ]
        // );        
    }
}
