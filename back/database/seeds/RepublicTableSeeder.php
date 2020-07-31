<?php

use App\Comment;
use App\Republic;
use Illuminate\Database\Seeder;

class RepublicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (App\Republic::class,1)->create()->each(function($republic){
          $user = App\User::findOrFail($republic->user_id);
          $comments = factory (App\Comment::class,1)->make();
          $republic->userFavoritas()->attach($user->id);
          $republic->Comments()->saveMany($comments);       
        });
    }
}
