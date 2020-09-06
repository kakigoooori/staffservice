<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'master',
            'staff management', //スタッフ管理
            'client management', //クライアント管理
            'matter management', //案件管理
            'order management' //受注管理
        ];
        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
    }
}
