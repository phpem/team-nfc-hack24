<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    public $faker;

    private $avatars;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->avatars = json_decode(file_get_contents(__DIR__ . '/avatars.json'), true);

		Model::unguard();
        $this->faker = Faker\Factory::create();

        DB::table('organisations')->delete();
        DB::table('teams')->delete();
        DB::table('users')->delete();
        DB::table('team_users')->delete();
        DB::table('votes')->delete();
        DB::table('criteria')->delete();

        $this->call('CriteriaTableSeeder');

        for($orgCounter=1;$orgCounter <= 5;$orgCounter++)
        {
            DB::table('organisations')->insert(['org_name' => $this->faker->company, 'created_at' => new DateTime, 'updated_at' => new DateTime]);

            for($teamCounter=1;$teamCounter <= 2; $teamCounter++)
            {
                $teamID = DB::table('teams')->insertGetId(['team_name' => ucwords(implode(' ', $this->faker->words($this->getRandNum(1, 3)))), 'org_id' => $orgCounter, 'created_at' => new DateTime, 'updated_at' => new DateTime]);
                $teamSize = $this->getRandNum(3, 20);
                $isManager = 1;

                for($userCounter=1;$userCounter <= $teamSize;$userCounter++)
                {
                    $avatar = $this->getAvatar();

                    $userID = DB::table('users')->insertGetId(['email' => $this->faker->email, 'password' => '$2y$10$mxVi9r10MRaUD66RlMqmvug4WZD3ingN5RIDvQZI6AYqS37AABYWG', 'first_name' => $this->faker->firstName, 'last_name' => $this->faker->lastName, 'created_at' => new DateTime, 'updated_at' => new DateTime, 'avatar' => $avatar]);
                    DB::table('team_users')->insert(['team_id' => $teamID, 'user_id' => $userID, 'is_manager' => $isManager, 'created_at' => new DateTime, 'updated_at' => new DateTime]);

                    // do the voting if not a manager for the team
                    if(!$isManager) {
                        $this->insertVotes($userID, $teamID);
                    }
                    $isManager = 0;
                }
            }
        }

        //Create organisation
        $orgID = DB::table('organisations')->insertGetId(['org_name' => 'Hack24', 'created_at' => new DateTime, 'updated_at' => new DateTime]);
        $teamID = DB::table('teams')->insertGetId(['team_name' => 'Team NFC', 'org_id' => $orgID, 'created_at' => new DateTime, 'updated_at' => new DateTime]);

        $userID = DB::table('users')->insertGetId(['email' => 'bob.builder@gmail.com', 'password' => '$2y$10$mxVi9r10MRaUD66RlMqmvug4WZD3ingN5RIDvQZI6AYqS37AABYWG', 'first_name' => 'Bob', 'last_name' => 'Builder', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'avatar' => $avatar]);
        DB::table('team_users')->insert(['team_id' => $teamID, 'user_id' => $userID, 'is_manager' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime]);

        $userID = DB::table('users')->insertGetId(['email' => 'openblue555@gmail.com', 'password' => '$2y$10$mxVi9r10MRaUD66RlMqmvug4WZD3ingN5RIDvQZI6AYqS37AABYWG', 'first_name' => 'Matt', 'last_name' => 'Brunt', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'avatar' => $avatar]);
        DB::table('team_users')->insert(['team_id' => $teamID, 'user_id' => $userID, 'is_manager' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime]);
        $this->insertVotes($userID, $teamID);

        $userID = DB::table('users')->insertGetId(['email' => 'james@tdchodgy.co.uk', 'password' => '$2y$10$mxVi9r10MRaUD66RlMqmvug4WZD3ingN5RIDvQZI6AYqS37AABYWG', 'first_name' => 'James', 'last_name' => 'Hodgson', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'avatar' => $avatar]);
        DB::table('team_users')->insert(['team_id' => $teamID, 'user_id' => $userID, 'is_manager' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime]);
        $this->insertVotes($userID, $teamID);

        $userID = DB::table('users')->insertGetId(['email' => 'gaz@example.com', 'password' => '$2y$10$mxVi9r10MRaUD66RlMqmvug4WZD3ingN5RIDvQZI6AYqS37AABYWG', 'first_name' => 'Gaz', 'last_name' => 'Jones', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'avatar' => $avatar]);
        DB::table('team_users')->insert(['team_id' => $teamID, 'user_id' => $userID, 'is_manager' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime]);
        $this->insertVotes($userID, $teamID);


        $userID = DB::table('users')->insertGetId(['email' => 'adoni@team-nfc.co.uk', 'password' => '$2y$10$mxVi9r10MRaUD66RlMqmvug4WZD3ingN5RIDvQZI6AYqS37AABYWG', 'first_name' => 'Adoni', 'last_name' => 'Pavlakis', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'avatar' => $avatar]);
        DB::table('team_users')->insert(['team_id' => $teamID, 'user_id' => $userID, 'is_manager' => 0, 'created_at' => new DateTime, 'updated_at' => new DateTime]);
        $this->insertVotes($userID, $teamID);

    }

    public function insertVotes($user, $team)
    {
        $voteAmount = $this->getRandNum(1, 7);
        $criteria = array(1, 2, 3, 4, 5, 6, 7);
        foreach ($this->faker->randomElements($criteria, $voteAmount) as $criterion) {
            $score = $this->getRandNum(1, 5);
            DB::table('votes')->insert(['criteria_id' => $criterion, 'score' => $score, 'team_id' => $team, 'user_id' => $user, 'created_at' => new DateTime, 'updated_at' => new DateTime]);
        }
    }

    public function getAvatar()
    {
        $index = array_rand($this->avatars, 1);

        return $this->avatars[$index];
    }

    public function getRandNum($min = '', $max = '')
    {
        if($min == '' || $max == '') {
            return $this->faker->randomNumber();
        }
        else{
            return $this->faker->numberBetween($min, $max);
        }
    }
}