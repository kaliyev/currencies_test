<?php

namespace App\Console\Commands;

use Illuminate\Console\Command,
    Illuminate\Support\Facades\Http,
    App\Domain\CurrencyDTO,
    App\Domain\CurrencyService;

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
        $result = "Currencies saved.";
        $url = "https://nationalbank.kz/rss/rates_all.xml?switch=russian";

        $response = Http::timeout(5)->get($url);

        if ($response->successful())
        {
            $xml = new \SimpleXMLElement($response->body());

            $currencies_service = new CurrencyService;

            foreach($xml->channel->item as $item)
            {
                $currency = CurrencyDTO::fromXml($item);               
                
                $currencies_service->saveCurrency($currency);
            }
        } else {
            if ($response->clientError()) {
                $result = "Error: " . $response->status();                
            }
            if ($response->serverError()) {
                $result = "Error: " . $response->body();
            }
        }

        $this->info($result);
    }
}
