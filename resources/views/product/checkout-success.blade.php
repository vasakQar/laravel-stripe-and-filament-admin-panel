<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<style>
    .success-message {
        background-color: #d1e7dd;
        height: 100px;
        color: #0f5132;
        font-size: 22px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
    }
</style>
<body class="antialiased">
    <h1>Success</h1>
    <p class="success-message">
        {{ $message }}
    </p>
</body>
</html>
