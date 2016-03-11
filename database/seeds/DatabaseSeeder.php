<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // ATTENTION PAS EN PRODUCTION !!!!
        // Suppression de toutes les données !!!
        DB::table('permission_role')->delete();
        DB::table('permissions')->delete();
        DB::table('role_user')->delete();
        DB::table('roles')->delete();
        DB::table('users')->delete(); // ATTENTION, PAS EN PRODUCTION !!!!
        $this->command->info('Tables vidées !!!');

        $this->call('UserTableSeeder');
        $this->call('RoleTableSeeder');
        $this->call('PermissionTableSeeder');

        $this->command->info('Database seeded !');

        Model::reguard();
    }
}

class UserTableSeeder extends Seeder {

    public function run()
    {
        $user = new App\User();
        $user->name = 'Super Administrateur';
        $user->email = env('ADMIN_EMAIL');
        $user->telephone = 'à préciser';
        $user->fonction = 'Super administrateur';
        $user->divers = 'Compte non modifiable';
        $user->password = Hash::make('1Administrateur');
        $this->command->info('Utilisateur Super Administrateur créé !');
        $user->save();

        $user = new App\User();
        $user->name = 'Gestionnaire';
        $user->email = 'test1@test.fr';
        $user->password = Hash::make('1Gestionnaire');
        $this->command->info('Utilisateur Gestionnaire créé !');
        $user->save();

        $user = new App\User();
        $user->name = 'Utilisateur';
        $user->email = 'test2@test.fr';
        $user->password = Hash::make('1Utilisateur');
        $this->command->info('Utilisateur Utilisateur créé !');
        $user->save();
    }

}

class RoleTableSeeder extends Seeder {

    public function run()
    {
        $Radmin = new App\Role;
        $Radmin->name = 'role_administrateur';
        $Radmin->display_name = 'Administrateur';
        $Radmin->description = 'role_administrateur : administrateur application';
        $Radmin->save();
        $this->command->info('role_administrateur créé');

        $Rgestion = new App\Role;
        $Rgestion->name = 'role_gestionnaire';
        $Rgestion->display_name = 'Gestionnaire';
        $Rgestion->description = 'role_gestionnaire : modification des données';        
        $Rgestion->save();
        $this->command->info('role_gestionnaire créé');

        $Rutil = new App\Role;
        $Rutil->name = 'role_utilisateur';
        $Rutil->display_name = 'Utilisateur';
        $Rutil->description = 'role_utilisateur : simple utilisateur';
        $Rutil->save();
        $this->command->info('role_utilisateur créé');

        // Attache les trois rôles aux trois utilisateurs
        $user = App\User::where('name','=','Super Administrateur')->first();
        $user->attachRole($Radmin);
        $this->command->info('role_administrateur attaché à user Administrateur');

        $user = App\User::where('name','=','Gestionnaire')->first();
        $user->attachRole($Rgestion);
        $this->command->info('role_gestionnaire attaché à user Gestionnaire');

        $user = App\User::where('name','=','Utilisateur')->first();
        $user->attachRole($Rutil);
        $this->command->info('role_utilisateur attaché à user Utilisateur');
    }

}

class PermissionTableSeeder extends Seeder {

    public function run()
    {
        // Créer les permissions

        $a = new App\Permission();
        $a->name = 'perm_administrateur';
        $a->display_name = 'Permission Administrateur';
        $a->save();
        $this->command->info('perm_administrateur créé');

        $g = new App\Permission();
        $g->name = 'perm_gestionnaire';
        $g->display_name = 'Permission Gestionnaire';
        $g->save();
        $this->command->info('perm_gestionnaire créé');

        $u = new App\Permission();
        $u->name = 'perm_utilisateur';
        $u->display_name = 'Permission Utilisateur';
        $u->save();
        $this->command->info('perm_utilisateur créé');      

        // Attacher les permissions aux roles

        $role = App\Role::where('name', 'role_administrateur')->first();
        $role->attachPermission($a);
        $role->attachPermission($g);
        $role->attachPermission($u);
        $this->command->info('role_administrateur hérite perm admin. gestionnaire, utilisateur');   

        $role = App\Role::where('name', 'role_gestionnaire')->first();
        $role->attachPermission($g);
        $role->attachPermission($u);
        $this->command->info('role_gestionnaire hérite perm gestionnaire, utilisateur');

        $role = App\Role::where('name', 'role_utilisateur')->first();
        $role->attachPermission($u);
        $this->command->info('role_utilisateur hérite perm utilisateur');

    }

}
