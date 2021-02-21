<?php

use Illuminate\Database\Seeder;
use App\Follow;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 2; $i <= 10; $i++) {
          Follow::create([
              'follow_id' => $i,
              'follower_id' => 1,
              'created_at' => now()
          ]);
    }
}
}
