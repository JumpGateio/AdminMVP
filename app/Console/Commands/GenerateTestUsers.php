<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class GenerateTestUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:users {count : The number of users to generate.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a test set of users.';

    /**
     * @var \App\Models\User
     */
    private $users;

    public function __construct(User $users)
    {
        parent::__construct();
        $this->users = $users;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $count = (int)$this->argument('count');

        factory(\App\Models\User::class, $count)->create()->each(function ($user) {
            $user->details()->save(factory(\JumpGate\Users\Models\User\Detail::class)->make());
            $user->roles()->attach(rand(1, 2));
        });
    }
}
