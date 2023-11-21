<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;

class ComicController extends Controller
{
    protected $comic;

    protected $categories;

    /**
     * Display a listing of the resource.
     */

    public function __construct(Comic $comic)
    {
        $this->comic = $comic;

        // TODO: Replace this placeholder $categories array with categories model
        $categories = [
            0 => collect(['id' => 0, 'category_name' => 'Fantasy', 'color' => '123456']),
            1 => collect(['id' => 1, 'category_name' => 'Thriller', 'color' => '000003']),
            2 => collect(['id' => 2, 'category_name' => 'Action', 'color' => '000006']),
        ];

        $this->categories = collect($categories);
    }

    public function index()
    {
        $comics = Comic::all();
        return view("comic.index-comic", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $categories = Category::all();
        
        $categories = $this->categories;

        return view("comic.create-comic", compact("categories"));
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

        return redirect()->route('comic.index');
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

        $categories = $this->categories;

        return view("comic.edit-comic", compact("comic", "categories"));
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
        
        return redirect()->route('comic.index');
    }

    public function search(Request $request, Comic $comic){
        if($request->has('search')){
            $comic = comic::where('comic_name','LIKE', '%'.$request->search . '%')->get();
        }
        else {
            $comic = comic::all();
        }
        
        return view('comic.index-comic',['comics'=>$comic]);
    
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comics = Comic::find($id);
        $comics->delete();

        return redirect()->route('comic.index');  
    }
}
