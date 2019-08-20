<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $user =  App\User::create([
            'name'      => 'faisal' , 
            'email'     => 'faisalkhokher50@gmail.com' , 
            'password'  => bcrypt('45846360000')  ,
            'admin'     => 1 

        ]);

        App\Profile::create([

            'user_id'  => $user -> id , 
            'avatar'   => 'uploads/avaters/1.jpg' , 
            'about'    => 'Synonyms for about. Synonyms: Adverb. around, round. Synonyms: Preposition. apropos, apropos of, as far as, as for, as regards (also as respects), as to, concerning, of, on, regarding, respecting, touching, toward (or towards)' , 
            'facebook' => 'facebook.com' , 
            'youtube'  => 'youtube.com' 
        ]);
    }
}
