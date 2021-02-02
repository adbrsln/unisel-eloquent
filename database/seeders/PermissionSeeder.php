<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect($this->permissions())->each(function($permission) {
    		Permission::create(['name' => $permission]);
        });

        collect($this->rolePermissions())->each(function($permissions, $role) {
        	Role::create(['name' => $role])
        		->givePermissionTo($permissions);
        });
    }

    private function rolePermissions()
    {
    	return [
            'superadmin' => [
                'create-user',
                'update-user',
                'view-user',
                'view-all-user',
                'delete-user',
            ],
    		'administrator' => [
    			'create-user',
	    		'update-user',
	    		'view-user',
	    		'view-all-user',
    		],
    		'user' => [
    			'view-profile',
    			'update-profile',
    		],
    	];
    }

    private function permissions()
    {
    	return [
    		'create-user',
    		'update-user',
    		'view-user',
    		'view-all-user',
    		'delete-user',
    		'view-profile',
    		'update-profile'
    	];
    }
}
