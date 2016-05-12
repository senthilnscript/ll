<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Class, App\Subject, App\Student, App\Mark;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
		/*** seeding of class and subject table ***/
		
        // $this->call(UserTableSeeder::class);

        /*Model::reguard();*/
    }
}
