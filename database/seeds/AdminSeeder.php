<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert(
          [
            'name' => 'admin',
            'email' => 'aaa@admin.com',
            'password' => Hash::make('password123'),
          ]);

    }
}
