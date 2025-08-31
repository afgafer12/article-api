<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        for ($i=0; $i < 23; $i++) {     
            \App\Models\Post::create([
                'title'=> 'title 12345678901234567890 '.($i + 1),
                'content'=> 'content Lorem40 ipsum dolor sit amet consectetur adipisicing elit. Quisquam dicta quae consequatur laudantium magnam laboriosam deserunt provident reprehenderit sit atque aperiam, nisi amet explicabo asperiores nemo. Distinctio nobis repudiandae quis, architecto est veniam, ex iste amet corrupti nulla earum reprehenderit.',
                'category'=> 'category 12345678901234567890',
                'status'=> 'publish',
            ]);
        }
    }
}
