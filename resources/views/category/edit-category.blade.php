@extends('category.content')
<x-app-layout>
<div class="container mt-5">
    <div>
        <h3>Edit Categories</h3>
    </div>
    <div class="card">
        <div class="card-header">
        </div class="card-body">

            <form method="POST" action="{{ route('category.update', $category->id) }}">
                @csrf
                @method('PATCH')
                <!-- Input paling penting untuk nyambung ke backend -->
                <input name="category_name" type="text" placeholder="Enter category name here" value="{{$category->category_name}}"  required/>
                <input name="color" type="text" placeholder="Enter category color here" value="{{$category->color}}" required />
                
                <button type="submit" class="btn btn-primary">update</button>
            </form>        
        </div>
        </div>
    </div>
</div>
</x-app-layout>