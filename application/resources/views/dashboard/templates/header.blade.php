<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? 'Dashboard' }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    @stack('styles')


</head>

<body class="d-flex flex-column vh-100">
    <nav class=" d-flex justify-content-between navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Majoo Teknologi Indonesia</a>
        <a href="{{ route('login') }}" class="btn btn-light">Login</a>
    </nav>
