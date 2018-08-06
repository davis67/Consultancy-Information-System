<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Team;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        $this->call('PermissionsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('ConnectRelationshipsSeeder');

          Model::reguard();
    
     }
}
