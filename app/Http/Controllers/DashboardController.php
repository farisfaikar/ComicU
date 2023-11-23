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
        $dateRange = collect(Carbon::now()->subDays(6)->toPeriod(now(), '1 day'));
        
        $comicsAddedData = Comic::select('created_at')
            ->where('created_at', '>=', now()->subDays(7))
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            })
            ->map(function ($group) {
                return count($group);
            })
            ->sortKeys()
            ->pad(7, 0)
            ->values()
            ->all();

        $transactionsAddedData = Transaction::select('created_at')
            ->where('created_at', '>=', now()->subDays(7))
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            })
            ->map(function ($group) {
                return count($group);
            })
            ->sortKeys()
            ->pad(7, 0)
            ->values()
            ->all();

        $categories = [];

        // Generate the date and month for the past 7 days
        for ($i = 6; $i >= 0; $i--) {
            $date = now()
                ->subDays($i)
                ->format('d F'); // Adjust the format as needed
            $categories[] = $date;
        }
        // dd($comicsAddedData, $transactionsAddedData);

        return view('dashboard', compact('comicsAddedData', 'transactionsAddedData', 'categories'));
    }
}
