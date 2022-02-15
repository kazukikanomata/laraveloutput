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
        <a href="{{ url('/select/{select}/tasks') }}" style="text-decoration: none;">
            <div class="catego-box catego-item1">
                <div class="catego-text">
                    <h3>NW</h3>
                    <p>Use More</p>
                </div>
            </div>
        </a>
        <a href="{{ url('/tasks') }}" style="text-decoration: none;">
            <div class="catego-box catego-item2">
                <div class="catego-text">
                    <h3>NP</h3>
                    <p>Use More</p>
                </div>
            </div>
        </a>
        <a href="{{ url('/tasks') }}" style="text-decoration: none;">
            <div class="catego-box catego-item3">
                <div class="catego-text">
                    <h3>WW</h3>
                    <p>Use More</p>
                </div>
            </div>
        </a>
        <a href="{{ url('/tasks') }}" style="text-decoration: none;">
            <div class="catego-box catego-item4">
                <div class="catego-text">
                    <h3>WP</h3>
                    <p>Use More</p>
                </div>
            </div>
        </a>
    </div>
</body>
</html>
@endsection