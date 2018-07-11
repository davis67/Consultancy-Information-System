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

        $user = App\User::create([
            'name' => 'Davis Agaba',
            'email' => 'dora@gmail.com',
            'title' => 'consultant',
            'team' => 'BDS',
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
