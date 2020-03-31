<?php
namespace App\Domain;

use App\Models\Currency as CurrencyModel,
    App\Domain\Currency;

/**
 * Репозитории валюты для работы с базой
 * @property CurrencyModel $model
 */
class CurrencyRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new CurrencyModel;
    }

    /**
     * Поиск записи в базе по id
     */
    public function findById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    /**
     * Поиск записи в базе по коду валюты
     */
    public function findByName($name)
    {
        return $this->model->where('name', $name)->first();
    }

    /**
     * Запись в базу новой валюты
     */
    public function create(Currency $currency)
    {
        $model = new $this->model;
        $model->name = $currency->getName();
        $model->rate = $currency->getRate();
        $model->date = $currency->getDate();

        return $model->save();
    }

    /**
     * Обновление валюты в базе
     */
    public function update(Currency $currency, CurrencyModel $model)
    {
        $model->name = $currency->getName();
        $model->rate = $currency->getRate();
        $model->date = $currency->getDate();        

        return $model->save();
    }
}