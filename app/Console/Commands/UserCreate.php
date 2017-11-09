<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new User';

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
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('Name');

        $email = $this->ask('E-mail');

        do {
            $password = $this->secret('Password');

            $check = strlen($password) < 6;

            if ($check) {
                $this->error('ERROR: The password at least 6 characters');
            }
        } while ($check);

        $confirm = $this->secret('Confirm password');

        if ($password !== $confirm) {
            $this->error('ERROR: Password and confirmation do not match');

            return false;
        }

        $user = User::updateOrCreate([
                'email' => $email,
            ], [
                'name' => $name,
                'password' => bcrypt($password),
            ]);

        $this->info('The user with name "'.$user->name.'" and e-mail "'.$user->email.'" is created!');
    }
}
