<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class PromptUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prompt:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the default user for this portfolio application.';

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
        $name = $this->ask('What is your name');
        $email = $this->ask('What is your email');
        $title = $this->ask('What is your title (profession)');
        $password = $this->secret('Create a password');
        $confirm = $this->secret('Confirm password');
        if($password != $confirm){
            $this->error('Passwords do not match.');
            exit;
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->title = $title;
        $user->password = Hash::make($password);
        $user->save();

        $this->alert('User has been created, you are ready to use the application!');
    }
}
