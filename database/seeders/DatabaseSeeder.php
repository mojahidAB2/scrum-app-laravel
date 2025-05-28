<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // Dans database/seeders/DatabaseSeeder.php
public function run() {
    \App\Models\Role::create(['name' => 'product_owner']);
    \App\Models\Role::create(['name' => 'scrum_master']);
    \App\Models\Role::create(['name' => 'developer']);
}
}
