@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Categories</h3>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-default">Create Category</a>

        <br><br>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->active }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}"
                           class="btn btn-default">Edit</a>

                        <a href="{{ route('admin.categories.delete', ['id' => $category->id]) }}"
                           class="btn btn-default">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@stop