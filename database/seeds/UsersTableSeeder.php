<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Emerson Henrique',
            'email' => 'email@gmail.com',
            'password' => bcrypt('123')
        ]);
    }
}
