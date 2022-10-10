<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            [
                'name' => 'Luis Alberto Rojas Adames',
                'email' => 'adames.lancero@gmail.com',
                'password' => \Hash::make('123456')
            ]
        );

        foreach($users as $item){
            $user = User::updateOrCreate($item);
            $token = $user->createToken('auth_token')->plainTextToken;
        }
    }
}
