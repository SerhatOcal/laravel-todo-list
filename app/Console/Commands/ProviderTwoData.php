<?php

namespace App\Console\Commands;

use App\Providers;
use App\Tasks;
use Illuminate\Console\Command;

class ProviderTwoData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'providerTwo:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ProviderTwo Api Data Kaydet';

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
        $providers = new Providers();
        $data = $providers->getData('http://www.mocky.io/v2/5d47f235330000623fa3ebf7');
        $tasks =  new Tasks();
        $tasks->saveData($data, 2);

        $this->info("ProviderTwo Api Verileri Database Kaydedildi");
    }
}
