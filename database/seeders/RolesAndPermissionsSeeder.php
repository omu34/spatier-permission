<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
         // Create roles
         Role::create(['name' => 'admin']);
         Role::create(['name' => 'employee']);
         Role::create(['name' => 'employer']);
         Role::create(['name' => 'business']);
         Role::create(['name' => 'dealer']);
         Role::create(['name' => 'agent']);

         // Create permissions
         Permission::create(['name' => 'manage business']);
         Permission::create(['name' => 'manage employer']);
         Permission::create(['name' => 'manage dealer']);
         Permission::create(['name' => 'manage agent']);
         Permission::create(['name' => 'manage employee']);
         Permission::create(['name' => 'view products']);

         // Assign permissions to roles as needed
         $adminRole = Role::findByName('admin');
         $adminRole->givePermissionTo(
             'manage business',
             'manage employer',
             'manage dealer',
             'manage agent',
             'manage employee'
         );

         $employeeRole = Role::findByName('employee');
         $employeeRole->givePermissionTo(
             'manage business',
             'manage employer',
             'manage dealer',
             'manage agent',
             'view products'
         );

         $employerRole = Role::findByName('employer');
         $employerRole->givePermissionTo( 'manage employer');

         $businessRole = Role::findByName('business');
         $businessRole->givePermissionTo('manage business');

         $dealerRole = Role::findByName('dealer');
         $dealerRole->givePermissionTo('manage dealer');

         $agentRole = Role::findByName('agent');
         $agentRole->givePermissionTo('manage agent');
    }
}
