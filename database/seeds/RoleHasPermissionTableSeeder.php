<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //managerロールのパーミッション設定
        $permissions = [
            'master',
            'staff management',
            'client management',
            'matter management',
            'order management'
        ];
        $role = Role::findByName('マネージャー');
        $role->givePermissionTo($permissions);

        //staffロールのパーミッション設定
        $permissions = [
            'staff management'
        ];
        $role = Role::findByName('スタッフ');
        $role->givePermissionTo($permissions);
    }
}
