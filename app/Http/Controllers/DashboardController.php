<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $comicsAddedData = $this->getModelAddedData(Comic::class);
        $transactionsAddedData = $this->getModelAddedData(Transaction::class);

        $categories = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()
                ->subDays($i)
                ->format('d F'); // Adjust the format as needed
            $categories[] = $date;
        }

        return view('dashboard', compact('comicsAddedData', 'transactionsAddedData', 'categories'));
    }

    private function getModelAddedData($modelClass)
    {
        $dateRange = collect();
        $values = [];

        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::now()->subDays($i);
            $formattedDate = $date->format('d-m-Y');

            $modelCount = $modelClass::whereDate('created_at', $date)->count();

            $dateRange[] = $formattedDate;
            $values[] = $modelCount;
        }

        return array_reverse(array_combine(range(0, count($dateRange) - 1), $values));
    }
}
