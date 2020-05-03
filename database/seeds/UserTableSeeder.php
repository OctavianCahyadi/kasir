<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => bcrypt('123123123'),
                'role' => '1',
            ],
            [
                'name' => 'Karyawan',
                'email' => 'kasir@kasir.com',
                'username' => 'kasir',
                'password' => bcrypt('123123123'),
                'role' => '2',
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'username' => 'user',
                'password' => bcrypt('123123123'),
                'role' => '0',
            ],
        ]);
    }
}
