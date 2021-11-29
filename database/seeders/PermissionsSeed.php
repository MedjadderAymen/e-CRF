<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'user_management_access',

            'permission_create',
            'permission_edit',
            'permission_show',
            'permission_delete',
            'permission_access',

            'role_create',
            'role_edit',
            'role_show',
            'role_delete',
            'role_access',

            'support_create',
            'support_edit',
            'support_show',
            'support_delete',
            'support_access',

            'admin_create',
            'admin_edit',
            'admin_show',
            'admin_delete',
            'admin_access',

            'user_create',
            'user_edit',
            'user_show',
            'user_delete',
            'user_access',

            'patient_create',
            'patient_edit',
            'patient_show',
            'patient_delete',
            'patient_access',

            'consent_create',
            'consent_edit',
            'consent_show',
            'consent_delete',
            'consent_access',

            'crf_create',
            'crf_edit',
            'crf_show',
            'crf_delete',
            'crf_access',

            'inclusion_exclusion_core_form_create',
            'inclusion_exclusion_core_form_edit',
            'inclusion_exclusion_core_form_show',
            'inclusion_exclusion_core_form_delete',
            'inclusion_exclusion_core_form_access',

            'device_log_create',
            'device_log_edit',
            'device_log_show',
            'device_log_delete',
            'device_log_access',

            'control_solution_create',
            'control_solution_edit',
            'control_solution_show',
            'control_solution_delete',
            'control_solution_access',

            'glucose_create',
            'glucose_edit',
            'glucose_show',
            'glucose_delete',
            'glucose_access',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        //gets all permissions vie Gate::before rule; see AuthServiceProvider
        Role::create(['name' => 'Super Admin']);

        $role = Role::create(['name' => 'Doctor']);

        $doctorPermissions = [
            'patient_create',
            'patient_edit',
            'patient_show',
            'patient_delete',
            'patient_access',

            'consent_create',
            'consent_edit',
            'consent_show',
            'consent_delete',
            'consent_access',

            'crf_create',
            'crf_edit',
            'crf_show',
            'crf_delete',
            'crf_access',

            'inclusion_exclusion_core_form_create',
            'inclusion_exclusion_core_form_edit',
            'inclusion_exclusion_core_form_show',
            'inclusion_exclusion_core_form_delete',
            'inclusion_exclusion_core_form_access',

            'device_log_create',
            'device_log_edit',
            'device_log_show',
            'device_log_delete',
            'device_log_access',

            'control_solution_create',
            'control_solution_edit',
            'control_solution_show',
            'control_solution_delete',
            'control_solution_access',

            'glucose_create',
            'glucose_edit',
            'glucose_show',
            'glucose_delete',
            'glucose_access',

        ];

        foreach ($doctorPermissions as $permission){
            $role->givePermissionTo($permission);
        }

    }
}
