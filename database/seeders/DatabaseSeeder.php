<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);

    	$this->seedDevelopment();
    }

    private function seedDevelopment()
    {
        if(app()->environment() != 'production') {
            \App\Models\User::factory()->create([
                'name' => 'Superadmin',
                'email' => 'super@app.com',
            ])
            ->assignRole('superadmin')
            ->assignRole('user');

            \App\Models\User::factory()->create([
                'name' => 'Administrator',
                'email' => 'admin@app.com',
            ])
            ->assignRole('administrator')
            ->assignRole('user');

            \App\Models\User::factory(10)
                ->create()
                ->each(function($user) {
                    $user->assignRole('user');
                });
        }
    }
}
