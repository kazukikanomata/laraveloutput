@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
</head>
<body>
    <div class="category">
        @foreach($categories as $category)
        <a href="{{ route('categories.show',['category'=> $category->name ]) }}" style="text-decoration: none;">
            <div class="catego-box catego-item1">
                <div class="catego-text">
                    <h3>{{ $category->name }}</h3>
                    <p>Use More</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</body>
</html>
@endsection