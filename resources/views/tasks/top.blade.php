@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>トップページ</title>
    </head>
    <body>
        <div class="text-center" id="your-element-selector">
            <h2>Focus</h2>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">使ってみる</a>
        </div>
    </body>
</html>
@endsection