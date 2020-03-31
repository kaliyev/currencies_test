<?php

namespace App\Http\Controllers;

use App\Domain\CurrencyService,
    Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    private $currencies_service;

    public function __construct()
    {
        $this->currencies_service = new CurrencyService;
    }

    public function index(Request $request)
    {
        $date = ($request->get('date') !== null) ? $request->get('date') : "now";
        $currencies = $this->currencies_service->getAllByDate($date);

        if (empty($currencies)) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        return $currencies;
    }

    public function view($name, Request $request)
    {
        $date = ($request->get('date') !== null) ? $request->get('date') : "now";
        $currencies = $this->currencies_service->getCurrencyByDate($name, $date);

        if ($currencies === null) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        return $currencies;
    }
}
