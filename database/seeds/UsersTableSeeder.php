<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 1; $i <= 10; $i++) {
            User::create([
                'username'    => 'test_user' .$i,
                'mail'          => 'test' .$i .'@test.com',
                'password'       => Hash::make('12345678'),
                'created_at'     => now(),
                'modified_at'     => now()
            ]);
        }
    }
}
