<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try
        {
            DB::beginTransaction();

            Role::create(['name' => 'Admin']);

            DB::table('users')->insert([
                'id'=> 1,
                'name'=> 'admin',
                'email'=> 'admin@admin.com',
                'active'=> true,
                'password'=> bcrypt('admin'),
                'email_verified_at' => date("Y-m-d H:i:s")
            ]);

            $user = User::find(1);

            $user->assignRole('Admin');

            DB::commit();

        }
        catch (Exception $e)
        {

            DB::rollback();
        }
    }

}
