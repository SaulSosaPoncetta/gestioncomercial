<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'vendedor']);
        Role::firstOrCreate(['name' => 'cajero']);
        Role::firstOrCreate(['name' => 'repositor']);
        Role::firstOrCreate(['name' => 'almacenista']);
        Role::firstOrCreate(['name' => 'usuario']);
    }
}