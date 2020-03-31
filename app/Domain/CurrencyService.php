<?php
namespace App\Domain;

use App\Domain\CurrencyRepository,
    App\Domain\Currency;

/** 
 * Сервис для работы с курсами валют
 * @property CurrencyReposiry $currency_repository
*/
class CurrencyService
{
    private $currency_repository;

    public function __construct()
    {
        $this->currency_repository = new CurrencyRepository;
    }

    /**
     * Поиск валюты в базе
     */
    public function findCurrency(Currency $currency)
    {
        return $this->currency_repository->findByName($currency->getName());
    }

    /**
     * Сохранение валюты в базе
     */
    public function saveCurrency(Currency $currency)
    {
        $db_currency = $this->findCurrency($currency);
        if ($db_currency !== null) {
            $this->currency_repository->update($currency, $db_currency);
        } else {
            $this->currency_repository->create($currency);
        }
    }
}