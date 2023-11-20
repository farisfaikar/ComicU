@extends('category.content')
<x-app-layout>
<div class="container mt-5">
    <div>
        <h3>Categories</h3>
    </div>
    <div class="card">
        <div class="card-header">
        </div class="card-body">

        {{-- @if(session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong> {{session('msg')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}

            <form method="POST" action="{{ route('category.store') }}">
                @csrf
                <!-- Input paling penting untuk nyambung ke backend -->
                <input name="category_name" type="text" placeholder="Enter category name here" required />
                <input name="color" type="text" placeholder="Enter category color here" required />
                
                <button type="submit" class="btn btn-primary">Create</button>
            </form>        
        </div>
        </div>
    </div>
</div>
</x-app-layout>