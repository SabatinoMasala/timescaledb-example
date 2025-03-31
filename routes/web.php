<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    $range = [2022, 2023];

    $res = \App\Utils\Query::execute('revenue-per-period', [
        'bucket' => '1 month',
        'from' => Carbon::createFromDate($range[0])->startOfYear(),
        'to' => Carbon::createFromDate($range[1])->endOfYear(),
    ]);

    $data = collect($res)
        ->map(function($item) {
            return [
                'month' => Carbon::parse($item->period)->format('M'),
                'year' => Carbon::parse($item->period)->format('Y'),
                'revenue' => $item->revenue
            ];
        })
        ->groupBy('month')
        ->mapWithKeys(function ($items, $month) {
            return [
                $month => collect($items)->mapWithKeys(function ($item) use ($month) {
                    return [
                        'name' => $month,
                        $item['year'] => (float) $item['revenue']
                    ];
                })
            ];
        })
        ->values();

    $totalRows = \App\Utils\Query::execute('rows-per-period', [
        'from' => Carbon::createFromDate($range[0])->startOfYear(),
        'to' => Carbon::createFromDate($range[1])->endOfYear(),
    ]);

    return Inertia::render('Welcome', [
        'data' => $data,
        'total_rows' => $totalRows[0]->count,
        'categories' => collect(range($range[0], $range[1]))->map(fn($year) => (string) $year),
    ]);
})->name('home');
