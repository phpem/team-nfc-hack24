<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        $faker = Faker\Factory::create();

        DB::table('organisations')->delete();
        DB::table('teams')->delete();
        DB::table('users')->delete();
        DB::table('team_users')->delete();
        DB::table('votes')->delete();
        DB::table('criteria')->delete();

        $this->call('CriteriaTableSeeder');

        $currentUser = 1;
        $currentTeam = 1;

        for($orgCounter=1;$orgCounter < 5;$orgCounter++)
        {
            DB::table('organisations')->insert(['org_name' => $faker->company, 'created_at' => new DateTime, 'updated_at' => new DateTime]);

            for($teamCounter=1;$teamCounter <= 2; $teamCounter++)
            {
                DB::table('teams')->insert(['team_name' => implode(' ', $faker->words(3)), 'org_id' => $orgCounter, 'created_at' => new DateTime, 'updated_at' => new DateTime]);
                $teamSize = $faker->numberBetween(3, 20);
                $isManager = 1;

                for($userCounter=1;$userCounter <= $teamSize;$userCounter++)
                {
                    DB::table('users')->insert(['email' => $faker->email, 'password' => '$2y$10$mxVi9r10MRaUD66RlMqmvug4WZD3ingN5RIDvQZI6AYqS37AABYWG', 'first_name' => $faker->firstName, 'last_name' => $faker->lastName, 'created_at' => new DateTime, 'updated_at' => new DateTime]);
                    DB::table('team_users')->insert(['team_id' => $currentTeam, 'user_id' => $currentUser, 'is_manager' => $isManager, 'created_at' => new DateTime, 'updated_at' => new DateTime]);

                    // do the voting
                    $voteAmount = $faker->numberBetween(1, 7);
                    $criteria = array(1, 2, 3, 4, 5, 6, 7);
                    foreach ($faker->randomElements($criteria, $voteAmount) as $criterion)
                    {
                        $score = $faker->numberBetween(1, 5);
                        DB::table('votes')->insert(['criteria_id' => $criterion, 'score' => $score, 'team_id' => $currentTeam, 'user_id' => $currentUser, 'created_at' => new DateTime, 'updated_at' => new DateTime]);
                    }

                    $currentUser ++;
                }
                
                $currentTeam ++;
            }
        }
    }
}