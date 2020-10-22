<?php

namespace Database\Seeders;
require 'vendor/autoload.php';
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
          'username'=>'admin',          // 帳號
          'password'=>bcrypt('00000000'),  // 密碼
        ]);
    }
}
