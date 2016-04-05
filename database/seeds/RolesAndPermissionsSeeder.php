<?php
/*
|--------------------------------------------------------------------------
| Roles & Permissions Seeder
|--------------------------------------------------------------------------
|
| This Seeder class allows you to update and create Roles & Permissions
| for the Laravel Entrust package.
|
| USE -> php artisan db:seed --class=RolesAndPermissionsSeeder
|
| https://github.com/thomasfw/RolesAndPermissionsSeeder
|
|--------------------------------------------------------------------------
| Make sure you update the namespaces for your User & Entrust models
|--------------------------------------------------------------------------
*/
use App\User as User;
use App\Role as Role;
use App\Permission as Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesAndPermissionsSeeder extends Seeder {
    protected $roles = [

        'admin' => [
            'display_name'  =>  'Administrator', // optional
            'description'   =>  'administer the website and manage users/data', // optional
            'permissions'   => array(
                'is_god',
                'can_edit_users',
                'can_add_users',
                'can_delete_users',
                'can_view_users',
                'can_edit_stations',
                'can_add_stations',
                'can_delete_stations',
                'can_view_stations',
                'can_edit_events',
                'can_add_events',
                'can_delete_events',
                'can_view_events',
                'can_edit_registrations',
                'can_add_registrations',
                'can_delete_registrations',
                'can_view_registrations',
                'can_edit_athletes',
                'can_add_athletes',
                'can_delete_athletes',
                'can_view_athletes',
                'can_edit_station_data',
                'can_add_station_data',
                'can_delete_station_data',
                'can_view_station_data',
                'can_edit_newsletter',
                'can_add_newsletter',
                'can_delete_newsletter',
                'can_view_newsletter',
                'can_view_blog',
                'can_edit_blog',
                'can_add_blog',
                'can_delete_blog',
                'can_view_comment',
                'can_add_comment',
                'can_edit_comment',
                'can_delete_comment'
            ) // optional
        ],

        'manager' => [
            'display_name'  =>  'Manager', // optional
            'description'   =>  'Same as admin but without the is_god permission', // optional
            'permissions'   => array(
                'can_edit_users',
                'can_add_users',
                'can_delete_users',
                'can_view_users',
                'can_edit_stations',
                'can_add_stations',
                'can_delete_stations',
                'can_view_stations',
                'can_edit_events',
                'can_add_events',
                'can_delete_events',
                'can_view_events',
                'can_edit_registrations',
                'can_add_registrations',
                'can_delete_registrations',
                'can_view_registrations',
                'can_edit_athletes',
                'can_add_athletes',
                'can_delete_athletes',
                'can_view_athletes',
                'can_edit_station_data',
                'can_add_station_data',
                'can_delete_station_data',
                'can_view_station_data',
                'can_edit_newsletter',
                'can_add_newsletter',
                'can_delete_newsletter',
                'can_view_newsletter',
                'can_view_blog',
                'can_edit_blog',
                'can_add_blog',
                'can_delete_blog',
                'can_view_comment',
                'can_add_comment',
                'can_edit_comment',
                'can_delete_comment'
            ) // optional
        ],

        'staff' => [
            'display_name'  =>  'Staff', // optional
            'description'   =>  'basic view and limited add/edit permissions', // optional
            'permissions'   => array(
                'can_view_users',
                'can_view_stations',
                'can_view_events',
                'can_edit_registrations',
                'can_add_registrations',
                'can_view_registrations',
                'can_edit_athletes',
                'can_add_athletes',
                'can_view_athletes',
                'can_edit_station_data',
                'can_add_station_data',
                'can_delete_station_data',
                'can_view_station_data',
                'can_view_blog',
                'can_edit_blog',
                'can_add_blog',
                'can_delete_blog',
                'can_view_comment',
                'can_add_comment',
                'can_edit_comment',
                'can_delete_comment'
            ) // optional
        ],

        'subscriber' => [
            'display_name'  =>  'Subscriber', // optional
            'description'   =>  'view blogs and interact with blog comments also able to add/modify a registration', // optional
            'permissions'   => array(
                'can_view_users',
                'can_view_stations',
                'can_view_events',
                'can_edit_registrations',
                'can_add_registrations',
                'can_view_registrations',
                'can_view_athletes',
                'can_view_station_data',
                'can_view_blog',
                'can_view_comment',
                'can_add_comment',
                'can_edit_comment',
                'can_delete_comment'
            ) // optional
        ],
    ];


    protected $permissions = [

        // Add your Permissions here
        'is_god' => [],
        'can_edit_users' => [],
        'can_add_users' => [],
        'can_delete_users' => [],
        'can_view_users' => [],
        'can_edit_stations' => [],
        'can_add_stations' => [],
        'can_delete_stations' => [],
        'can_view_stations' => [],
        'can_edit_events' => [],
        'can_add_events' => [],
        'can_delete_events' => [],
        'can_view_events' => [],
        'can_edit_registrations' => [],
        'can_add_registrations' => [],
        'can_delete_registrations' => [],
        'can_view_registrations' => [],
        'can_edit_athletes' => [],
        'can_add_athletes' => [],
        'can_delete_athletes' => [],
        'can_view_athletes' => [],
        'can_edit_station_data' => [],
        'can_add_station_data' => [],
        'can_delete_station_data' => [],
        'can_view_station_data' => [],
        'can_edit_newsletter' => [],
        'can_add_newsletter' => [],
        'can_delete_newsletter' => [],
        'can_view_newsletter' => [],
        'can_view_blog' => [],
        'can_edit_blog' => [],
        'can_add_blog' => [],
        'can_delete_blog' => [],
        'can_view_comment' => [],
        'can_add_comment' => [],
        'can_edit_comment' => [],
        'can_delete_comment' => []
    ];


    /**
    * Roles
    *
    * @return array()
    */
    public function roles()
    {
        return $this->roles;
    }

    /**
     * Permissions
     *
     * @param  $name
     * @return array()
     */
    public function permissions($name = '')
    {
        $single = (array_key_exists($name,$this->permissions) ? array($name =>$this->permissions[$name]) : false );
        return ($name ? $single : $this->permissions);
    }


    /**
    * Run the Seeder
    *
    * @return void
    */
    public function run()
    {
        DB::table(Config::get('entrust.permissions_table'))->delete();

        foreach ($this->roles() as $key => $val) {
            $this->command->info(" ");
            $this->command->info('Creating/updating the \''.$key.'\' role');
            $this->command->info('-----------------------------------------');
            $val['name'] = $key;
            $this->reset($val);
        }
        $this->cleanup();
    }


    /**
    * Reset Role, Permissions & Users
    *
    * @param  $role
    * @return void
    */
    public function reset($role)
    {
        $commandBullet = '  -> ';

        // The Old Role
        $originalRole = Role::where('name',$role['name'])->first();
        if($originalRole) Role::where('id',$originalRole->id)->update(['name' => $role['name'].'__remove']);

        // The New Role
        $newRole = new Role();
        $newRole->name  = $role['name'];
        if(isset($role['display_name'])) $newRole->display_name  = $role['display_name']; // optional
        if(isset($role['description'])) $newRole->description  = $role['description']; // optional
        $newRole->save();
        $this->command->info($commandBullet."Created $role[name] role");

        // Set the Permissions (if they exist)
        $pcount = 0;
        if(!empty($role['permissions']))
        {
            foreach ($role['permissions'] as $permission_name) {

                $permission = $this->permissions($permission_name);
                if($permission === false || (!$permission_name)) {
                    $this->command->error($commandBullet."Failed to attach permission '$permission_name'. It does not exist");
                    continue;
                }

                $newPermission = Permission::where('name',$permission_name)->first();
                if (!$newPermission) {
                    $newPermission = new Permission();
                    $newPermission->name = key($permission);
                    if(isset($permission['display_name'])) $newPermission->display_name = $permission['display_name']; // optional
                    if(isset($permission['description'])) $newPermission->description  = $permission['description']; // optional
                    $newPermission->save();
                }
                $newRole->attachPermission($newPermission);
                $pcount++;
            }
        }
        $this->command->info($commandBullet."Attached $pcount permissions to $role[name] role");

        // Update old records
        if ($originalRole)
        {
            $userCount = 0;
            $RoleUsers = DB::table(Config::get('entrust.role_user_table'))->where('role_id',$originalRole->id)->get();
            foreach ($RoleUsers as $user) {
                $u = User::where('id',$user->user_id)->first();
                $u->attachRole($newRole);
                $userCount++;
            }
            $this->command->info($commandBullet."Updated role attachment for $userCount users");

            Role::where('id',$originalRole->id)->delete(); // will also remove old role_user records
            $this->command->info($commandBullet."Removed the original $role[name] role");
        }
    }


    /**
    * Cleanup()
    * Remove any roles & permissions that have been removed
    * @return void
    */
    public function cleanup()
    {
        $commandBullet = '  -> ';
        $this->command->info(" ");
        $this->command->info('Cleaning up roles & permissions:');
        $this->command->info('--------------------------------');

        $storedRoles = Role::all();
        if(!empty($storedRoles)) {
            $definedRoles = $this->roles();
            foreach ($storedRoles as $role) {
                if ( !array_key_exists($role->name,$definedRoles) ) {
                    Role::where('name',$role->name)->delete();
                    $this->command->info($commandBullet.'The \''.$role->name.'\' role was removed');
                }
            }
        }
        $storedPerms = DB::table(Config::get('entrust.permissions_table'))->get();
        if(!empty($storedPerms)) {
            $definedPerms = $this->permissions();
            foreach ($storedPerms as $perm) {
                if ( !array_key_exists($perm->name,$definedPerms) ) {
                    DB::table(Config::get('entrust.permissions_table'))->where('name',$perm->name)->delete();
                    $this->command->info($commandBullet.'The \''.$perm->name.'\' permission was removed');
                }
            }
        }
        $this->command->info($commandBullet.'Done');
        $this->command->info(" ");
    }

}
