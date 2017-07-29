<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Eloquent::unguard();

        //call uses table seeder class
		  $this->call('InvestmentTableSeeder');
		        //this message shown in your terminal after running db:seed command
		  $this->command->info("Investment table seeded :)");
       }
    }

class InvestmentTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$vader = DB::table('investments')->insert([
				'user_id'   => 1,
				'scheme_id'      => 18546,
				'buy_nav'   => 24,
				'current_nav' => 25,
				'current_value'  => 4000,
				'invest_amnt' => 3799,
				
			]);

		DB::table('investments')->insert([
				'user_id'   => 1,
				'scheme_id'      => 18546,
				'buy_nav'   => 24,
				'current_nav' => 25,
				'current_value'  => 4000,
				'invest_amnt' => 3799,
				
			]);

		DB::table('investments')->insert([
				'user_id'   => 1,
				'scheme_id'      => 18546,
				'buy_nav'   => 24,
				'current_nav' => 25,
				'current_value'  => 4000,
				'invest_amnt' => 3799,
				
			]);
	}

}

