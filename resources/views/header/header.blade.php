<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.12.1/b-2.2.3/cr-1.5.6/fh-3.2.3/r-2.3.0/sc-2.0.6/sl-1.4.0/datatables.min.css"/>
    <link rel="stylesheet" href="{{asset('css/style-admin.css')}}"/>
</head>
<body>
<header>
    <div class="logout">
        <a href="{{route('painel')}}">Home</a>
        <a href="{{route('logout')}}">Sair</a>
    </div>
</header>