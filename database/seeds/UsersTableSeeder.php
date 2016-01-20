<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
        $user = new User(array(
        	"id_number" => 1001234,
        	"fname" => "Lalaine",
        	"lname" => "Gella",
        	'gender' => 0,
        	"age" => 30,
        	"email" => "lalainegella@gmail.com",
        	"password" => md5("admin"),
        	"privilege" => 0
        ));

        $user->save();

        $user = new User(array(
        	"id_number" => 1101318,
        	"fname" => "Roltaire",
        	"lname" => "Solis",
            'course' => "Information Technology",
        	'gender' => 1,
        	"age" => 21,
        	"email" => "rosoroyroy@gmail.com",
        	"password" => md5("akoroy"),
        	"privilege" => 1
        ));

        $user->save();
    }
}
