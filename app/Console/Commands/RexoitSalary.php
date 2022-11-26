<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Support\DripEmailer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;


class RexoitSalary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rexoit:salary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Salary has sent';

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
        $input['name'] = $this->ask("Enter your name?");
        $input['phone'] = $this->ask("Enter your phone?");
        $input['email'] = $this->ask("Enter your email?");
        $input['password'] = $this->ask("Enter your password?");
        $input['password'] = Hash::make($input['password']);
        $input['salary'] = $this->ask("Enter your salary?");

        // $this->info('user info-'. $input['name'] ."Phone:". $input['phone'] . "Email" .$input['email']."password:".$input['password'] . "Salary:".$input['salary']);

        User::create($input);
        $this->info("User Created Successfully");

        // $salary = $this->argument('amount');
        // for($i = 0; $i < $salary; $i++){
        //     User::factory()->create();
        // } 
        //return 0;
    }
}
