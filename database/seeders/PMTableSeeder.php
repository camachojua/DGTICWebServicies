<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_managers')->insert(
            [
                'first_name' => 'Rafael',
                'last_name' => 'González',
                'email' => 'rafael.glez@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

        DB::table('project_managers')->insert(
            [
                'first_name' => 'Juan',
                'last_name' => 'Pérez',
                'email' => 'juan.perez@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
    }
}
