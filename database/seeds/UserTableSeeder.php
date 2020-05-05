<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::create([
            'name'=>"M Ahmed Mushtaq",
            'email'=>'injurdlion332@gmail.com',
            'password'=>bcrypt('shine123'),
            'address'=>'SDK',
            'phone'=>'03316062251'
        ]);
    }
}
