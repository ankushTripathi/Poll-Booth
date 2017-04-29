<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as DB;
use App\Poll as Poll;
use App\PollOptions as PollOptions;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PollDataSeeder::class);
    }
}

class PollDataSeeder extends Seeder {

	public function run()
	{
		DB::table('polls')->delete();
		DB::table('Poll_options')->delete();
 
		$Poll1 = Poll::create(array('title' => 'Best PHP framework'));
		$Poll2 = Poll::create(array('title' => 'Favourite Pizza'));
		$Poll3 = Poll::create(array('title' => 'Your development skills'));
 
		PollOptions::create(array('title'=>'Laravel 5','vote'=>0,'Poll_id'=>$Poll1->id));
		PollOptions::create(array('title'=>'Yii 2','vote'=>0,'Poll_id'=>$Poll1->id));
		PollOptions::create(array('title'=>'Codeigniter','vote'=>0,'Poll_id'=>$Poll1->id));
		PollOptions::create(array('title'=>'Other','vote'=>0,'Poll_id'=>$Poll1->id));
 
		PollOptions::create(array('title'=>'Margherite','vote'=>0,'Poll_id'=>$Poll2->id));
		PollOptions::create(array('title'=>'Capricciosa','vote'=>0,'Poll_id'=>$Poll2->id));
		PollOptions::create(array('title'=>'Napoli','vote'=>0,'Poll_id'=>$Poll2->id));
 
		PollOptions::create(array('title'=>'Poor','vote'=>0,'Poll_id'=>$Poll3->id));
		PollOptions::create(array('title'=>'Good','vote'=>0,'Poll_id'=>$Poll3->id));
		PollOptions::create(array('title'=>'Top','vote'=>0,'Poll_id'=>$Poll3->id));
		
 
	}
 
}