<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CandidateTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 80) as $index)
		{
            $user = User::create([
                'full_name' => '',
                'email'     => '',
                'password'  => '',
                'type'      => 'candidate'
            ]);

			Candidate::create([
                'id'          => $user->id,
                'website_url' => '',
                'description' => '',
                'job_type'    => '',
                'category_id' => '',
                'available'   => true,
                'slug'        => \Str::slug()
			]);
		}
	}

}