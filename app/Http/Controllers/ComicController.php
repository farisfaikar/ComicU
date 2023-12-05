<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comic;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    protected $comic;

    protected $category;

    /**
     * Display a listing of the resource.
     */

    public function __construct(Comic $comic, Category $category)
    {
        $this->comic = $comic;

        $this->category = $category;
    }

    public function index()
    {
        $comics = Comic::paginate(10);
        return view("comic.index-comic", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->category->all();

        return view("comic.create-comic", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
  
        $comic_photo=$request -> file('comic_photo');
        $filename = date('Y-m-d' ).$comic_photo->getClientOriginalName();
        $path = 'comic-photo/'.$filename;

        Storage::disk('public') -> put($path,file_get_contents($comic_photo));

        $data['comic_name'] =$request->comic_name;
        $data['synopsis'] =$request->synopsis;
        $data['author'] =$request->author;
        $data['comic_photo'] =$filename;
        $data['stock'] =$request->stock;
        $data['category_id'] =$request->category_id;

        Comic::create($data);
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

        $categories = $this->category->all();

        return view("comic.edit-comic", compact("comic", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $comic_photo=$request -> file('comic_photo');
        $filename = date('Y-m-d' ).$comic_photo->getClientOriginalName();
        $path = 'comic-photo/'.$filename;

        Storage::disk('public') -> put($path,file_get_contents($comic_photo));

        $input = $request->all();
        $comic = $this->comic->find($comic->id);
        $comic->comic_name = $input['comic_name'];
        $comic->synopsis = $input['synopsis'];
        $comic->comic_photo = $filename;
        $comic->author = $input['author'];
        $comic->stock = $input['stock'];
        $comic->category_id = $input['category_id'];
        $comic->save();
        
        return redirect()->route('comic.index');
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
    
    public function search(Request $request, Comic $comic){
        if($request->has('search')){
            $comic = comic::where('comic_name','LIKE', '%'.$request->search . '%')->paginate(10);
        }
        else {
            $comic = comic::all();
        }
        
        return view('comic.index-comic',['comics'=>$comic]);
    
    }
}
