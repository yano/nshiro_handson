<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


        // --- User ---

        // 自分をユーザとして追加
        factory(App\User::class)->create(
            [
                'name' => env('TESTUSER_NAME', 'test user'),
                'email' => env( 'TESTUSER_EMAIL', 'test@example.com'),
                'password' => bcrypt(env('TESTUSER_PASSWORD')),
            ]
        );

        // 自分以外のユーザを９名追加する
        factory(App\User::class, 9)->create();


        // --- Admin ---

        factory(App\Admin::class)->create(
            [
                'username' => env('TESTADMIN_NAME', 'admin'),
                'password' => bcrypt(env('TESTADMIN_PASSWORD')),
            ]
        );

        // --- Message ---
        factory(App\Message::class, 20)->create();
    }
}
