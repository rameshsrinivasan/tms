<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
    }
}
class UsersTableSeeder extends Seeder {
	public function run() {
		//delete users table records
		DB::table('users')->truncate();
		//insert some dummy records
		DB::table('users')->insert(array(
		array('name'=>'Admin','email'=>'admin@admin.com','password'=> Hash::make('welcome'), 'first_name'=>'Ramesh', 'last_name'=>'Srinivasan', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s') )
		));
	}
}
class ProjectsTableSeeder extends Seeder {
    public function run() {
        //delete users table records
        DB::table('projects')->delete();
        //insert some dummy records
        DB::table('projects')->insert(array(
            array('name'=>'General Work','status'=>1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s') ),
            array('name'=>'Leave','status'=>1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s') )
        ));
    }
}