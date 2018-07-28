<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\Builders\Config\AppendConfigBuilder;

class AppendConfig extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'append:config
                           {ConfigName}{GroupTitle}{syllables*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'append to a config file';





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
    public function handle(AppendConfigBuilder $config)
    {

        $fail = ['app',
            'auth',
            'broadcasting',
            'cache',
            'database',
            'filesystems',
            'hashing',
            'image-defaults',
            'logging',
            'mail',
            'queue',
            'services',
            'session',
            'view'];

        if (in_array($this->argument('ConfigName'), $fail)){

            $this->error('That name is not allowed!');

            return;

        }


        if ( $config->appendConfigFiles($this->argument()) ) {

            $this->sendSuccessMessage();

            return;

        } else {


            $this->error('Oops, something went wrong!');

            return;

        }



    }

    private function sendSuccessMessage()
    {

        $this->info('Config file successfully appended');

    }


}
