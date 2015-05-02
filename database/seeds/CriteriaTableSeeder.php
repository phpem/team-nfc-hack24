<?php

use Illuminate\Database\Seeder;

class CriteriaTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('criteria')->delete();

        $users = array();

        $data = array (
            ['criterion' => 'Meeting planning', 'weight' => 1, 'org_id' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['criterion' => 'Attendance / Punctuality rating', 'weight' => 1, 'org_id' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['criterion' => 'Overall team leadership', 'weight' => 1, 'org_id' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['criterion' => 'Team management', 'weight' => 1, 'org_id' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['criterion' => 'Micro management', 'weight' => 1, 'org_id' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['criterion' => 'Communication Skills', 'weight' => 1, 'org_id' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['criterion' => 'Overall happiness', 'weight' => 1, 'org_id' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime]
        );

        DB::table('criteria')->insert($data);
    }

}




