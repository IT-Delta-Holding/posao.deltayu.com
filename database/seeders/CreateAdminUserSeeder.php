<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $user = User::create([
//            'name' => 'Aleksandar Đorđević',
//            'email' => 'aleksandar.djordjevic@deltaholding.rs',
//            'company' => 'IT sektor',
//            'username' => 'djordjevia',
//            'password' => bcrypt('')
//        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

//        $user->assignRole([$role->id]);
    }
}
