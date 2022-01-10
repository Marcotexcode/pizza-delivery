@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center my-4 text-danger">
            AGGIUNGERE FORM PER DATI UTENTE
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-between flex-wrap">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Quantità</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Extra</th>
                    <th scope="col">Totale €</th>
                    <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Margherita</td>
                        <td>Funghi</td>
                        <td>12</td>
                        <td>
                            <a class="btn btn-primary" href="">Modifica</a>
                            <a class="btn btn-primary" href="">Elimina</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Paperino</td>
                        <td>Tratufo,funghi</td>
                        <td>13</td>
                        <td>
                            <a class="btn btn-primary" href="">Modifica</a>
                            <a class="btn btn-primary" href="">Elimina</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-primary" href="">Invia</a>
        </div>
    </div>
</div>
@endsection
