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
        $this->call(ActionsTableSeeder::class);
        $teams = [
            [
                'team' => 'TCS',
                'team_leader' => 'Mugisha Vivacious',
                'team_description' => 'Teschnical Support Services',
            ],
            [
                'team' => 'MCS',
                'team_leader' => 'Rebecca Namayanja',
                'team_description' => 'Management Consulting Services',
            ],
            [
                'team' => 'BDS',
                'team_leader' => 'William Kilama',
                'team_description' => 'Business Management Services',
            ],
            [
                'team' => 'HTA',
                'team_leader' => 'Connie Katusiime',
                'team_description' => 'Hanighton Trainning Academy',
            ],
            [
                'team' => 'HCM',
                'team_leader' => 'Betty Namutebbi',
                'team_description' => 'Human Commission Management',
            ],
            [
                'team' => 'CSS',
                'team_leader' => 'Leila Busingye',
                'team_description' => 'Co-operate Support Services',
            ],
            [
                'team' => 'DCS',
                'team_leader' => 'Agaba Davis',
                'team_description' => 'Development Consulting Services',
            ],
        ];

        App\Team::Insert(static::addTimeStamps($teams));

        $groups = [
            [
                'name' => 'intern',
                'description' => 'internship level',
            ],
            [
                'name' => 'consultant',
                'description' => 'fully employee',
            ],

            [
                'name' => 'Assistant Manager',
                'description' => 'junior manager',
            ],
        ];

        App\Usergroup::insert(static::addTimeStamps($groups));

        $user1 = App\User::create([
            'name' => 'Davis Agaba',
            'email' => 'dora@gmail.com',
            'team' => 'BDS',
            'reportsTo' => 'Viva Mugisha',
            'password' => bcrypt('password'),
            'admin' => 1,
            'is_permitted' => 1,
            'employeeNo' => 192,
        ]);

        App\Profile::create([
            'user_id' => $user1->id,
            'avatar' => 'uploads/1.jpeg',
            'telephone' => '078965433',
            'primary_address' => 'Kampala',
        ]);
        $user2 = App\User::create([
            'name' => 'Viva Mugisha',
            'email' => 'viva@gmail.com',
            'team' => 'TCS',
            'reportsTo' => 'EK',
            'password' => bcrypt('password'),
            'admin' => 1,
            'is_permitted' => 3,
            'employeeNo' => 003,
        ]);

        App\Profile::create([
            'user_id' => $user2->id,
            'avatar' => 'uploads/1.jpeg',
            'telephone' => '070989877',
            'primary_address' => 'Kampala',
        ]);
        $user3 = App\User::create([
            'name' => 'Kean Shan',
            'email' => 'keanshan@gmail.com',
            'team' => 'MCS',
            'reportsTo' => 'HR',
            'password' => bcrypt('password'),
            'admin' => 1,
            'is_permitted' => 4,
            'employeeNo' => 001,
        ]);

        App\Profile::create([
            'user_id' => $user3->id,
            'avatar' => 'uploads/1.jpeg',
            'telephone' => '078965433',
            'primary_address' => 'Kampala',
        ]);
        $user4 = App\User::create([
            'name' => 'HR',
            'email' => 'hr@gmail.com',
            'team' => 'MCS',
            'reportsTo' => 'None',
            'password' => bcrypt('password'),
            'admin' => 1,
            'is_permitted' => 7,
            'employeeNo' => 192,
        ]);

        App\Profile::create([
            'user_id' => $user4->id,
            'avatar' => 'uploads/1.jpeg',
            'telephone' => '078965433',
            'primary_address' => 'Kampala',
        ]);
    }
    
    public static function addTimeStamps($data)
    {
        return collect($data)->map(function ($datum) {
            $datum['created_at'] = now();
            $datum['updated_at'] = now();

            return $datum;
        })->toArray();
    }
}
