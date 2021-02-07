<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 1; $i <= 10; $i++) {
          Post::create([
              'user_id'    => $i,
              'post'       => 'これはテスト投稿' .$i,
              'created_at' => now(),
              'modified_at' => now()
          ]);
      }
    }
}
