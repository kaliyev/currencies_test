<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GetCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get currencies from national bank';

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
        $this->info("Currencies saved.");
    }
}
