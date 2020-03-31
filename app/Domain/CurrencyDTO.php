<?php
namespace App\Domain;

use App\Domain\Currency;

/**
 * DTO для валюты
 */
class CurrencyDTO
{
    /**
     * Получение данных из xml
     */
    static function fromXml($xml)
    {
        $currency = new Currency(
            null,
            (string)$xml->title,
            (float)$xml->description,
            (string)$xml->pubDate
        );

        return $currency;
    }

    /**
     * Получение данных из модели
     */
    static function fromModel($model)
    {
        $currency = new Currency(
            $model->id,
            $model->name,
            $model->rate,
            $model->date
        );

        return $currency;
    }
}

?>