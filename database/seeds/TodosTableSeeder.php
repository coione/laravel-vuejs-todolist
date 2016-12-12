<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('todos')->truncate();
        $faker = Faker::create();
        $date = date('Y-m-d H:i:s');

        for ($i=0; $i < 10; $i++) {
            DB::table('todos')->insert([
                'title'       => 'Call '.$faker->name.' '.$faker->lastName,
                'description' => $faker->paragraph,
                'created_at'  => $date,
                'updated_at'  => $date
            ]);
        }
    }
}
