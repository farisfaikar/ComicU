<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;

class ComicController extends Controller
{
    protected $comic;

    /**
     * Display a listing of the resource.
     */

    public function __construct(Comic $comic)
    {
        $this->comic = $comic;
    }

    public function index()
    {
        $comics = Comic::all();
        return view("comic.index", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("comic.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedata = $request->validate([
            'comic_name' => 'required',
            'synopsis' => 'required',
            'author'=>'required',
            'stock'=>'required',
            'category_id'=>'required'            
        ]);
        
        Comic::create($validatedata);

        return redirect('/comic');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::find($id);
        return view("comic.edit", compact("comic")) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $input = $request->all();
        $comic = $this->comic->find($comic->id);
        $comic->comic_name = $input['comic_name'];
        $comic->synopsis = $input['synopsis'];
        $comic->author = $input['author'];
        $comic->stock = $input['stock'];
        $comic->category_id = $input['category_id'];
        $comic->save();
        
        // $comics->update([
        //     'comics_name' => $request->comics_name,
        //     'synopsis' => $request->synopsis,
        //     'author'=>$request->author,
        //     'stock'=>$request->stock,
        //     'category_id'=> $request->category_id
        // ]);
        
        return redirect('/comic');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comics = Comic::find($id);
        $comics->delete();
        return redirect('/comic');  
    }
}
