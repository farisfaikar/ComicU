<?php

namespace App\Exports;
use App\Models\Comic;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportComic implements FromView

{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $comics = Comic::get();
        return view("comic.table-comic", compact("comics"));
    }
}
