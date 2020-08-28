<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function config()
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->can('master')){
                $roles = Role::all();
                $master = [];
                $staff_management = [];
                $client_management = [];
                $matter_management = [];
                $order_management = [];
                $permissions = [];
                foreach($roles as $role){
                    $master[$role['name']] = $role->hasPermissionTo('master');
                    $staff_management[$role['name']] = $role->hasPermissionTo('staff management');
                    $client_management[$role['name']] = $role->hasPermissionTo('client management');
                    $matter_management[$role['name']] = $role->hasPermissionTo('matter management');
                    $order_management[$role['name']] = $role->hasPermissionTo('order management');
                }
                $permissions[] = $master;
                $permissions[] = $staff_management;
                $permissions[] = $client_management;
                $permissions[] = $matter_management;
                $permissions[] = $order_management;
        
                return view('permission/config')->with([
                    'roles' => $roles,
                    'permissions' => $permissions
                ]);
            } else {
                return view('permission/error');
            }
        } else {
            return view('alert/alert');
        }
    }

    //権限変更
    public function editAuthority($id)
    {
        $role = Role::find($id);
        $permissions = [];
        $permissions['master'] = $role->hasPermissionTo('master');
        $permissions['staff_management'] = $role->hasPermissionTo('staff management');
        $permissions['client_management'] = $role->hasPermissionTo('client management');
        $permissions['matter_management'] = $role->hasPermissionTo('matter management');
        $permissions['order_management'] = $role->hasPermissionTo('order management');

        return view('permission/edit')->with([
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function editAuthorityDone(Request $request)
    {
        $role = Role::find($request['id']);
        if($request['master'] == 'allow'){
            $role->givePermissionTo('master');
        } else {
            $role->revokePermissionTo('master');
        }
        if($request['staff_management'] == 'allow'){
            $role->givePermissionTo('staff management');
        } else {
            $role->revokePermissionTo('staff management');
        }
        if($request['client_management'] == 'allow'){
            $role->givePermissionTo('client management');
        } else {
            $role->revokePermissionTo('client management');
        }
        if($request['matter_management'] == 'allow'){
            $role->givePermissionTo('matter management');
        } else {
            $role->revokePermissionTo('matter management');
        }
        if($request['order_management'] == 'allow'){
            $role->givePermissionTo('order management');
        } else {
            $role->revokePermissionTo('order management');
        }

        return redirect()->action('PermissionController@config');
    }

    //role付与
    public function giveRole($id)
    {
        $user = User::find($id);
        $role = $user->authority;

        switch($role){
            case "マネージャー":
                $user->assignRole('マネージャー');
                break;
            case "サブマネージャー":
                $user->assignRole('サブマネージャー');
                break;
            case "コーディネーター":
                $user->assignRole('コーディネーター');
                break;
            case "アシスタント":
                $user->assignRole('アシスタント');
                break;
            case "スタッフ":
                $user->assignRole('スタッフ');
                break;
        }
    }
}
