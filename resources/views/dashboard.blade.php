<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @livewireStyles



    <style>
        body {
            font-family: 'Nunito';
        }
    </style>


</head>

<body class="antialiased">

    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary border-bottom">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">Navbar</a>
            <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarNavAltMarkup"
              aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
              </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="nav-link" href="{{ route('suppliers') }}">Suppliers</a>
                    <a class="nav-link" href="{{ route('categories') }}">categories</a>
                    <a class="nav-link" href="{{ route('inventory') }}">Inventory</a>
                    <a class="nav-link" href="{{ route('purchases') }}">Purchases</a>
                    <a class="nav-link" href="{{ route('sales') }}">Sales</a>
                   
                </div>
            </div>
    </nav>


@extends('livewire.dashboard')


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
@livewireScripts

</body>

</html>