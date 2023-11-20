@extends('category.content')
<x-app-layout>
<div class="container mt-5">
    <div>
        <h3>Categories</h3>
    </div>
    <div class="card">
        <div class="card-header">
        <a href="{{ route('category.create')}}" class="btn btn-primary">
            Create Category
        </a>
        </div class="card-body">
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Category-Name</th>
                    <th>Color</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <th>{{$item->category_name}}</th>
                    <th>{{$item->color}}</th>
                    <th>
                        <div>
                            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-primary">Edit Kategori</a>
                            <form action="{{ route('category.destroy', $item->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
</x-app-layout>