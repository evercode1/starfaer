<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\Builders\Config\ConfigBuilder;

class MakeConfig extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:config
                           {Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a config file';





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
    public function handle(ConfigBuilder $config)
    {

        $fail = ['app',
            'auth',
            'broadcasting',
            'cache',
            'consonants',
            'database',
            'filesystems',
            'hashing',
            'image-defaults',
            'logging',
            'mail',
            'queue',
            'services',
            'session',
            'view',
            'vowels'];

        if (in_array($this->argument('Name'), $fail)){

            $this->error('That name is not allowed!');

            return;

        }


        if ( $config->makeConfigFiles($this->argument()) ) {

            $this->sendSuccessMessage();

            return;

        } else {


            $this->error('Oops, something went wrong!');

            return;

        }



    }

    private function sendSuccessMessage()
    {

        $this->info('Config file successfully created');

    }


}
