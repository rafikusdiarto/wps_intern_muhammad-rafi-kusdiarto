<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create direktur
        $direktur = User::create([
            'name' => 'Prof. Jessika Hahn Sr.',
            'email' => 'direktur@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('inidirektur'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($direktur));
        $direktur->assignRole('DIREKTUR');

        $manager_ops = User::create([
            'name' => 'Felix Hoppe',
            'email' => 'manageroperasional@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('managerops123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($manager_ops));
        $manager_ops->assignRole('MANAGER_OPS');

        $manager_keu = User::create([
            'name' => 'Nils Davis',
            'email' => 'managerkeuangan@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('managerkeu123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($manager_keu));
        $manager_keu->assignRole('MANAGER_KEU');

        $staff_ops = User::create([
            'name' => 'Jules Goodwin',
            'email' => 'staffoperasional@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('staffops123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($staff_ops));
        $staff_ops->assignRole('STAFF_OPS');

        $staff_keu = User::create([
            'name' => 'Jordyn Smith',
            'email' => 'staffkeuangan@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('staffkeu123'),
            'remember_token' => \Str::random(60),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        event(new Registered($staff_keu));
        $staff_keu->assignRole('STAFF_KEU');
    }
}
