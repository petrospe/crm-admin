<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class CreateUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $adminEmail = 'admin@example.com'; // Replace with the desired admin user email

        // Check if an admin user with the specified email already exists
        $existingAdmin = User::where('email', $adminEmail)->first();

        if ($existingAdmin) {
            $this->info('Admin user already exists.');
        } else {
            $admin = new User;
            $admin->name = 'admin';
            $admin->email = $adminEmail;
            $admin->password = bcrypt('admin'); // You should hash the password properly
            $admin->role_id = 1;

            // You can also set other user attributes here

            $admin->save();

            $this->info('Admin user created successfully.');
        }
    }
}
