<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = public_path('data.sql');

        $db = [
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'database' => env('DB_DATABASE')
        ];

        exec("mysql -u ".env('DB_USERNAME')." -p".env('DB_PASSWORD')." ".env('DB_DATABASE')." < $sql");

        \Log::info('SQL Import Done');
    }
}
