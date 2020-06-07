<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Production extends Command
{
    protected $signature = 'production:install';
    protected $description = 'Install production';

    public function handle()
    {
        $this->info('Creating admin account');

        if(!is_null(DB::table('users')->find(1))) {
            $this->error('User with id 1 already exist');
            return;
        }

        $password = $this->secret('Type admin password');
        if(strlen($password) <= 5) {
            $this->error('Password must include at least 6 symbols');
            return;
        }

        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make($password),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->info('Admin account created successfully with login admin@admin.com');
    }
}
