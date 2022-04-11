@extends('layouts.app')
@section('content')
<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>タスク詳細</title>
    </head>
    <body>
        <h1>出力用サンプルページ</h1>
        <p>ユーザー名：</p>
        <p>年齢：</p>
    </body>
</html>
@endsection