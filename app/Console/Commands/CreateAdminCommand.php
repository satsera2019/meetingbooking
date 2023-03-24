<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name';
    protected $signature = 'admin:create {--f|first_name= : first_name of the newly created admin.} {--l|last_name= : last_name of the newly created admin.} {--e|email= : E-Mail of the newly created admin.}';


    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $description = 'Manually creates a new admin.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $first_name = $this->option('first_name');
        if ($first_name === null) {
            $first_name = $this->ask('Please enter your first name.');
        }

        $last_name = $this->option('last_name');
        if ($last_name === null) {
            $last_name = $this->ask('Please enter your last name.');
        }

        $email = $this->option('email');
        if ($email === null) {
            $email = $this->ask('Please enter your E-Mail.');
        }

        $password = $this->secret('Please enter a new password.');
        $password_confirmation = $this->secret('Please confirm the password');

        if ($password !== $password_confirmation) {
            $this->info('Passwords do not match');
            return;
        }

        try {
            $user = User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => Hash::make($password),
                'role' => 'admin',
            ]);
            $this->info('Admin user ' . $user->first_name . ' ' . $user->last_name . ' created successfully!');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return;
        }
    }
}
