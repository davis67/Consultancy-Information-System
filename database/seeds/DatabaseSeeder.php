<?php

use Illuminate\Database\Seeder;
use App\Team;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Team::create([
            'team' => 'TCS',
            'team_leader' => 'Mugisha Vivacious',
            'team_description' => 'Teschnical Support Services',
        ]);
        Team::create([
            'team' => 'MCS',
            'team_leader' => 'Rebecca Namayanja',
            'team_description' => 'Management Consulting Services',
        ]);
        App\Team::create([
            'team' => 'BDS',
            'team_leader' => 'William Kilama',
            'team_description' => 'Business Management Services',
        ]);
        App\Team::create([
            'team' => 'HTA',
            'team_leader' => 'Connie Katusiime',
            'team_description' => 'Hanighton Trainning Academy',
        ]);
        App\Team::create([
            'team' => 'HCM',
            'team_leader' => 'Betty Namutebbi',
            'team_description' => 'Human Commission Management',
        ]);
        App\Team::create([
            'team' => 'CSS',
            'team_leader' => 'Leila Busingye',
            'team_description' => 'Co-operate Support Services',
        ]);
        App\Team::create([
            'team' => 'DCS',
            'team_leader' => 'Agaba Davis',
            'team_description' => 'Development Consulting Services',
        ]);

        $user = App\User::create([
            'name' => 'Davis Agaba',
            'email' => 'dora@gmail.com',
            'title' => 'consultant',
            'team' => 'TCS',
            'status' => 'active',
            'reportsTo' => 'Ek',
            'password' => bcrypt('password'),
            'admin' => 1,
            'is_permitted' => 5,
            'employeeNo' => 192,
        ]);
        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/1.jpeg',
            'telephone' => '078965433',
            'primary_address' => 'Kampala',
        ]);

        App\Usergroup::create([
            'name' => 'intern',
            'description' => 'internship level',
        ]);
        App\Usergroup::create([
            'name' => 'consultant',
            'description' => 'fully employee',
        ]);
        App\Usergroup::create([
            'name' => 'Assistant Manager',
            'description' => 'junior manager',
        ]);
    }
}
