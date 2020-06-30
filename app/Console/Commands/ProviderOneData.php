<?php

namespace App\Console\Commands;

use App\Providers;
use App\Tasks;
use Illuminate\Console\Command;

class ProviderOneData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'providerOne:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ProviderOne Api Data Kaydet';

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
        $data = $providers->getData('http://www.mocky.io/v2/5d47f24c330000623fa3ebfa');
        $tasks =  new Tasks();
        $tasks->saveData($data, 1);

        $this->info("ProviderOne Api Verileri Database Kaydedildi");
    }
}
